<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\OrderLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout_form()
    {
        $user = Auth::user();

        if (!$user || Auth::user()->is_whsl_user()) {
            return redirect()->back();
        }

        return view('app.checkout', [
            'cart_items' => $user->cart_items,
            'cart_total' => $user->cart_total(),
            'user' => $user
        ]);
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
            'save_billing' => 'nullable',

            'ship_elsewhere' => 'nullable',

            'shipping_first_name' => 'required_with:ship_elsewhere',
            'shipping_last_name' => 'required_with:ship_elsewhere',
            'shipping_company' => 'required_with:ship_elsewhere',
            'shipping_address_line_1' => 'required_with:ship_elsewhere',
            'shipping_address_line_2' => 'required_with:ship_elsewhere',
            'shipping_city' => 'required_with:ship_elsewhere',
            'shipping_zip' => 'required_with:ship_elsewhere',
            'shipping_state' => 'required_with:ship_elsewhere',
            'shipping_phone' => 'required_with:ship_elsewhere',
            'save_shipping' => 'nullable',

            'clear_cart' => 'nullable'

        ], [
            'required_with' => 'The :attribute field is required.'
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
        if($request->ship_elsewhere == 1){
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
        } else{
            $shipping_address = [];
            foreach ($billing_address as $key => $value) {
                $new_key = str_replace('billing_', 'shipping_', $key);
                $shipping_address[$new_key] = $value;
            }
        }

        // Save the billing address to user's profile
        if($request->save_billing){
            $billing_address_save = [
                'type' => 'billing'
            ];

            foreach ($billing_address as $key => $value) {
                $new_key = str_replace('billing_', '', $key);
                $billing_address_save[$new_key] = $value;
            }

            if($user->address_billing){
                $user->address_billing->update($billing_address_save);
            } else{
                Address::create($billing_address_save);
            }
        }

        // Save the shipping address to user's profile
        if($request->save_shipping && $request->ship_elsewhere){
            $shipping_address_save = [
                'type' => 'shipping'
            ];
            foreach ($shipping_address as $key => $value) {
                $new_key = str_replace('shipping_', '', $key);
                print_r($new_key . ' : ', $value);
                $shipping_address_save[$new_key] = $value;
            }
            if($user->address_shipping){
                $user->address_shipping->update($shipping_address_save);
            } else{
                Address::create($shipping_address_save);
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
        if($request->clear_cart){
            $user->cart_empty();
        }

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'order' => $order->load('items')
            ]);
        }

        return redirect('/orders/' . $order->id);
    }
}
