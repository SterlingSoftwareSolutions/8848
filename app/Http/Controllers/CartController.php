<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\CartItems;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\OrderLog;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private function parse_cartitems(Request $request){
        $cart_items = [];

        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            $cartIndex = substr($key, strlen('variant_quantity_'));

            if (isset($requestData['variant_quantity_' . $cartIndex])) {
                $variant = [
                    'id' => $cartIndex,
                    'quantity' => $requestData['variant_quantity_' . $cartIndex]
                ];

                $cart_items[] = $variant;
            }
        }

        return $cart_items;
    }

    public function index(Request $request){
        $user = Auth::user();
        $items = $user->cart_items;
        $total_price = $items->sum(function($cart_item){
            return $cart_item->variant->price * $cart_item->quantity;
        });

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'cart' => [
                    'quantity' => $items->sum('quantity'),
                    'total_price' => $total_price,
                    'items' => $items
                ]
            ]);
        }

        return view('app.cart', [
            'quantity' => $items->sum('quantity'),
            'total_price' => $total_price,
            'items' => $items
        ]);
    }

    public function add(Request $request){
        $request->validate([
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'nullable|min:1'
        ]);

        $user = Auth::user();
        $user->cart_add($request->variant_id, $request->quantity ?? 1);

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'message' => "Variant {$request->variant_id} added to cart"
            ]);
        } else{
            return back()->with(['success' => "Item added to cart"]);
        }
    }

    public function update(Request $request){

        $request->validate([
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'nullable|min:1'
        ]);

        $user = Auth::user();

        if($user->cart_update($request->variant_id, $request->quantity ?? 1)){
            if($request->wantsJson()){
                return response()->json([
                    'success' => true,
                    'message' => "Variant {$request->variant_id} updated in cart"
                ]);
            } else{
                return back()->with(['success' => 'Item quantity updated']);
            }
        }

        return response()->json([
            'success' => false,
            'message' => "Variant {$request->variant_id} not found in cart"
        ]);
    }

    public function bulkupdate(Request $request){
        $user = Auth::user();

        $parsed_cartitems = $this->parse_cartitems($request);

        foreach($parsed_cartitems as $item){
            $user->cart_update($item['id'], $item['quantity']);
        }

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'message' => "Variants updated in cart"
            ]);
        } else{
            return back()->withErrors(['success' => 'Item quantities updated']);
        }
    }

    public function remove(Request $request, Variant $variant){

        $user = Auth::user();

        if($user->cart_remove($variant->id)){
            if($request->wantsJson()){
                return response()->json([
                    'success' => true,
                    'message' => "Variant {$variant->id} removed from cart"
                ]);
            }

            return back()->withErrors(['success' => "Item removed from cart"]);
        }

        if($request->wantsJson()){
            return response()->json([
                'success' => false,
                'message' => "Variant {$request->variant_id} not found in cart"
            ]);
        }

        return back()->withErrors(['error' => "Failed to remove item from cart"]);
    }

    public function checkout_form()
    {
        $user = Auth::user();
        if (!$user || Auth::user()->is_whsl_user()) {
            return redirect()->back();
        }

        return view('app.checkout', ['cart_items' => $user->cart_items, 'sub_totle' => $user->cart_total(), 'user' => $user]);
    }

    public function checkout(Request $request)
    {
        // Fetch user's cart
        $user = Auth::user();
        $cart_items = $user->cart_items;

        // Can't checkout if the cart is empty
        if($cart_items->count() < 1){
            return back()->withErrors(['error' => 'Your cart is empty.']);
        }

        // Validate inputs
        $request->validate([
            'billing_first_name' => 'required|string',
            'billing_last_name' => 'required|string',
            'billing_company' => 'required|string',
            'billing_address_line_1' => 'required|string',
            'billing_address_line_2' => 'required|string',
            'billing_city' => 'required|string',
            'billing_zip' => 'required|string',
            'billing_state' => 'required|string',
            'billing_phone' => 'required|string|min:10',
            'save_billing' => 'required:in:yes,no',

            'ship_to_billing' => 'required',

            'shipping_first_name' => 'required_if:ship_to_billing,0|string',
            'shipping_last_name' => 'required_if:ship_to_billing,0|string',
            'shipping_company' => 'required_if:ship_to_billing,0|string',
            'shipping_address_line_1' => 'required_if:ship_to_billing,0|string',
            'shipping_address_line_2' => 'required_if:ship_to_billing,0|string',
            'shipping_city' => 'required_if:ship_to_billing,0|string',
            'shipping_zip' => 'required_if:ship_to_billing,0|string',
            'shipping_state' => 'required_if:ship_to_billing,0|string',
            'shipping_phone' => 'required_if:ship_to_billing,0|string|min:10',
            'save_shipping' => 'required:in:yes,no',

        ]);

        $data = [
            'reference' => $this->generateRandomString(),
            'user_id' => $user->id,
            'order_type' => $user->role == 'client_wholesale' ? 'wholesale' : 'retail',
            'status' => $user->role == 'client_wholesale' ? 'unverified' : 'pending',
            'payment_status' => $user->role == 'client_wholesale' ? 'unpaid' : 'paid',
            'discount' => 0,
        ];

        $billing_address = [
            'billing_first_name' => $request->billing_first_name,
            'billing_last_name' => $request->billing_last_name,
            'billing_company' => $request->billing_company,
            'billing_address_line_1' => $request->billing_address_line_1,
            'billing_address_line_2' => $request->billing_address_line_2,
            'billing_city' => $request->billing_city,
            'billing_zip' => $request->billing_zip,
            'billing_state' => $request->billing_state,
            'billing_phone' => $request->billing_phone,
        ];

        // Shipping address is the same as billing address?
        if($request->ship_to_billing == 1){
            $shipping_address = [
                'shipping_first_name' => $request->billing_first_name,
                'shipping_last_name' => $request->billing_last_name,
                'shipping_company' => $request->billing_company,
                'shipping_address_line_1' => $request->billing_address_line_1,
                'shipping_address_line_2' => $request->billing_address_line_2,
                'shipping_city' => $request->billing_city,
                'shipping_zip' => $request->billing_zip,
                'shipping_state' => $request->billing_state,
                'shipping_phone' => $request->billing_phone,
            ];
        } else{
            $shipping_address = [
                'shipping_first_name' => $request->shipping_first_name,
                'shipping_last_name' => $request->shipping_last_name,
                'shipping_company' => $request->shipping_company,
                'shipping_address_line_1' => $request->shipping_address_line_1,
                'shipping_address_line_2' => $request->shipping_address_line_2,
                'shipping_city' => $request->shipping_city,
                'shipping_zip' => $request->shipping_zip,
                'shipping_state' => $request->shipping_state,
                'shipping_phone' => $request->shipping_phone,
            ];
        }

        // Save the billing address to user's profile
        if($request->save_billing){
            if($user->address_billing){
                $user->address_billing->update($billing_address);
            } else{
                Address::create($billing_address);
            }
        }

        // Save the shipping address to user's profile
        if($request->save_shipping && !$request->ship_to_billing){
            if($user->address_shipping){
                $user->address_shipping->update($shipping_address);
            } else{
                Address::create($shipping_address);
            }
        }

        $order = Order::create(
            array_merge($data, $billing_address, $shipping_address)
        );

        // Add items to the order
        foreach($cart_items as $item){
            OrderItems::create([
                'order_id' => $order->id,
                'variant_id' => $item->variant->id,
                'quantity' => $item->quantity,
                'full_price' => $item->variant->price,
                'price' => $item->variant->price
            ]);
        }

        // Log order
        OrderLog::create([
            'order_id' => $order->id,
            'status' => $order->status,
            'message' => 'Order created'
        ]);

        // Clear the user's cart
        $user->cart_empty();

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'order' => $order->load('items')
            ]);
        }

        return redirect('/orders/' . $order->id);
    }
}
