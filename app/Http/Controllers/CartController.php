<?php

namespace App\Http\Controllers;

use App\Models\CartItems;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $user = Auth::user();
        $items = $user->cart_items;
        $total_price = $items->sum(function($cart_item){
            return $cart_item->product->price * $cart_item->quantity;
        });

        return response()->json([
            'success' => true,
            'cart' => [
                'quantity' => $items->sum('quantity'),
                'total_price' => $total_price,
                'items' => $items
            ]
        ]);
    }

    public function add(Request $request){

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|min:1'
        ]);

        $user = Auth::user();
        $user->cart_add($request->product_id, $request->quantity ?? 1);

        return response()->json([
            'success' => true,
            'message' => "Product {$request->product_id} added to cart"
        ]);
    }

    public function update(Request $request){

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|min:1'
        ]);

        $user = Auth::user();
        $user->cart_add($request->product_id, $request->quantity ?? 1);

        return response()->json([
            'success' => true,
            'message' => "Product {$request->product_id} added to cart"
        ]);
    }

    public function remove(Request $request){

        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user = Auth::user();

        if($user->cart_remove($request->product_id)){
            return response()->json([
                'success' => true,
                'message' => "Product {$request->product_id} removed from cart"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Product {$request->product_id} not found in cart"
        ]);
    }
}
