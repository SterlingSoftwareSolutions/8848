<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\OrderLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function checkout_form()
    {
        $user = Auth::user();

        // This route doesn't exist for wholesale users
        if($user->is_wholesale()){
            return abort(404);
        }

        return view('app.checkout', [
            'cart_items' => $user->cart_items,
            'cart_total' => $user->cart_total(),
            'user' => $user
        ]);
    }


    public function checkout(Request $request)
    {
        $user = Auth::user();

        // This route doesn't exist for wholesale users
        if($user->is_wholesale()){
            return abort(404);
        }

        // Can't checkout if the cart is empty
        $cart_items = $user->cart_items;
        if($cart_items->count() < 1){
            return back()->withErrors(['error' => 'Your cart is empty.']);
        }

        // Validation rules
        $rules = [
            'save_billing' => 'nullable',
            'ship_elsewhere' => 'nullable',
            'dont_clear_cart' => 'nullable'
        ];

        $billing_validations = Address::rules('billing_', true);

        if($request->ship_elsewhere){
            $shipping_validations = Address::rules('shipping_', true);
        } else{
            $shipping_validations = [];
        }

        // Validate inputs
        $request->validate(
            array_merge($rules, $billing_validations, $shipping_validations)
        );

        $data = [
            'reference' => $this->generateRandomString(),
            'user_id' => $user->id,
            'order_type' => 'retail',
            'status' => 'pending',
            'payment_status' => 'unpaid',
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
                Address::create(array_merge($billing_address_save,[
                    'user_id' => $user->id,
                    'type' => 'billing'
                ]));
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
                Address::create(array_merge($shipping_address_save,[
                    'user_id' => $user->id,
                    'type' => 'billing'
                ]));
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
        if(!$request->dont_clear_cart){
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


    public function create_wholesale_order($user_id, $billing_address_data, $shipping_address_data, $notes = "")
    {
        // Format data for order creation
        $data = [
            'reference' => $this->generateRandomString(),
            'user_id' => $user_id,
            'order_type' => 'wholesale',
            'status' => 'unverified',
            'payment_status' => 'unpaid',
            'discount' => 0,
            'notes' => $notes
        ];

        $billing_address = [
            'billing_first_name' => $billing_address_data['first_name'],
            'billing_last_name' => $billing_address_data['last_name'],
            'billing_company' => $billing_address_data['company'],
            'billing_address_line_1' => $billing_address_data['address_line_1'],
            'billing_address_line_2' => $billing_address_data['address_line_2'],
            'billing_city' => $billing_address_data['city'],
            'billing_zip' => $billing_address_data['zip'],
            'billing_state' => $billing_address_data['state'],
            'billing_phone' => $billing_address_data['phone'],
        ];

        $shipping_address = [
            'shipping_first_name' => $shipping_address_data['first_name'],
            'shipping_last_name' => $shipping_address_data['last_name'],
            'shipping_company' => $shipping_address_data['company'],
            'shipping_address_line_1' => $shipping_address_data['address_line_1'],
            'shipping_address_line_2' => $shipping_address_data['address_line_2'],
            'shipping_city' => $shipping_address_data['city'],
            'shipping_zip' => $shipping_address_data['zip'],
            'shipping_state' => $shipping_address_data['state'],
            'shipping_phone' => $shipping_address_data['phone'],
        ];

        $order = Order::create(
            array_merge($data, $billing_address, $shipping_address)
        );

        return $order;
    }


    public function checkout_wholesale(Request $request)
    {
        $user = Auth::user();

        // This route doesn't exist for retail users
        if($user->is_retail()){
            return abort(404);
        }

        // Can't checkout if the cart is empty
        $cart_items = $user->cart_items;
        if($cart_items->count() < 1){
            throw ValidationException::withMessages([
                'error' => ['Your cart is empty'],
            ]);
        }

        // Billing address
        $saved_billing_address = $user->address_billing;
        if(!$saved_billing_address){
            throw ValidationException::withMessages([
                'error' => ['Billing address not found'],
            ]);
        }

        $billing_address_data = $saved_billing_address->validated();

        if(!$billing_address_data){
            throw ValidationException::withMessages([
                'error' => ['Billing address incomplete'],
            ]);
        }

        // Shipping address
        $saved_shipping_address = $user->address_shipping;
        if($saved_shipping_address){
            $shipping_address_data = $saved_shipping_address->validated();
            if(!$shipping_address_data){
                throw ValidationException::withMessages([
                    'error' => ['Shipping address incomplete'],
                ]);
            }
        } else{
            $shipping_address_data = $billing_address_data;
        }

        $order = $this->create_wholesale_order($user->id, $billing_address_data, $shipping_address_data, $request->notes ?? '');

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

    public function reorder(Order $order, Request $request)
    {
        $user = Auth::user();

        // This route doesn't exist for retail users
        if($user->id != $order->user_id || $user->is_retail()){
            return abort(404);
        }

        // Billing address
        $saved_billing_address = $user->address_billing;
        if(!$saved_billing_address){
            throw ValidationException::withMessages([
                'error' => ['Billing address not found'],
            ]);
        }

        $billing_address_data = $saved_billing_address->validated();

        if(!$billing_address_data){
            throw ValidationException::withMessages([
                'error' => ['Billing address incomplete'],
            ]);
        }

        // Shipping address
        $saved_shipping_address = $user->address_shipping;
        if($saved_shipping_address){
            $shipping_address_data = $saved_shipping_address->validated();
            if(!$shipping_address_data){
                throw ValidationException::withMessages([
                    'error' => ['Shipping address incomplete'],
                ]);
            }
        } else{
            $shipping_address_data = $billing_address_data;
        }

        $new_order = $this->create_wholesale_order($user->id, $billing_address_data, $shipping_address_data);

        $items = $order->items;

        foreach($items as $item){
            OrderItems::create([
                "order_id" => $new_order->id,
                "variant_id" => $item->variant_id,
                "quantity" => $item->quantity,
                "full_price" => $item->variant->price,
                "price" => $item->variant->price,
            ]);
        }

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'order' => $order->load('items')
            ]);
        }
        return redirect('/orders/' . $new_order->id);
    }
}
