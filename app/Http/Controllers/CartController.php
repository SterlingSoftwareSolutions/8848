<?php

namespace App\Http\Controllers;

use App\Models\CartItems;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
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

    public function remove(Request $request){

        $request->validate([
            'variant_id' => 'required|exists:variants,id',
        ]);

        $user = Auth::user();

        if($user->cart_remove($request->variant_id)){
            if($request->wantsJson()){
                return response()->json([
                    'success' => true,
                    'message' => "Variant {$request->variant_id} removed from cart"
                ]);
            }

            return back()->with(['success' => 'removed item from cart']);
        }

        if($request->wantsJson()){
            return response()->json([
                'success' => false,
                'message' => "Variant {$request->variant_id} not found in cart"
            ]);  
        }

        return back()->with(['error' => 'failed to remove item from cart']);
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();

        $order = Order::create([
            'user_id' => $user->id,
            'order_type' => $user->role == 'client_wholesale' ? 'wholesole' : 'retail',
            'status' => 'pending',
            'discount' => 0,

            'billing_first_name' => $user->address_billing->first_name,
            'billing_last_name' => $user->address_billing->last_name,
            'billing_company' => $user->address_billing->company,
            'billing_address_line_1' => $user->address_billing->address_line_1,
            'billing_address_line_2' => $user->address_billing->address_line_2,
            'billing_city' => $user->address_billing->city,
            'billing_zip' => $user->address_billing->zip,
            'billing_state' => $user->address_billing->state,
            'billing_phone' => $user->address_billing->phone,

            'shipping_first_name' => $user->address_shipping->first_name,
            'shipping_last_name' => $user->address_shipping->last_name,
            'shipping_company' => $user->address_shipping->company,
            'shipping_address_line_1' => $user->address_shipping->address_line_1,
            'shipping_address_line_2' => $user->address_shipping->address_line_2,
            'shipping_city' => $user->address_shipping->city,
            'shipping_zip' => $user->address_shipping->zip,
            'shipping_state' => $user->address_shipping->state,
            'shipping_phone' => $user->address_shipping->phone
        ]);

        $cart_items = $user->cart_items;

        foreach($cart_items as $item){
            OrderItems::create([
                'order_id' => $order->id,
                'variant_id' => $item->variant->id,
                'quantity' => $item->quantity,
                'full_price' => $item->variant->price,
                'price' => $item->variant->price
            ]);
        }

        $user->cart_empty();

        return response()->json([
            'success' => true,
            'order' => $order->load('items')
        ]);
    }
}
