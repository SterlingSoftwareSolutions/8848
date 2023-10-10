<?php

namespace App\Http\Controllers;

use App\Models\CartItems;
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
            'variant_id' => 'required|exists:products,id',
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
            return back()->withErrors(['success' => "Item added to cart"]);
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
                return back()->withErrors(['success' => 'Item quantity updated']);
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

            return back()->withErrors(['success' => 'removed item from cart']);
        }

        if($request->wantsJson()){
            return response()->json([
                'success' => false,
                'message' => "Variant {$request->variant_id} not found in cart"
            ]);  
        }

        return back()->withErrors(['error' => 'failed to remove item from cart']);
    }
}
