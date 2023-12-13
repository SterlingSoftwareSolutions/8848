<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private function parse_cartitems(Request $request)
    {
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

    public function index(Request $request)
    {
        $user = Auth::user();
        $items = $user->cart_items;
        $total_price = $user->cart_total();

        if ($request->wantsJson()) {
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

    public function add(Request $request)
    {

        $request->validate([
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'nullable|min:1'
        ]);


        $user = Auth::user();
        $user->cart_add($request->variant_id, $request->quantity ?? 1);

        if ($request->has('my_list_item')) {
            $user->my_list()->where(['variant_id' => $request->my_list_item])->delete();
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Variant {$request->variant_id} added to cart"
            ]);
        } else {
            return back()->with(['success' => "Item added to cart"]);
        }
    }

    public function update(Request $request)
    {

        $request->validate([
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'nullable|min:1'
        ]);

        $user = Auth::user();

        if ($user->cart_update($request->variant_id, $request->quantity ?? 1)) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => "Variant {$request->variant_id} updated in cart"
                ]);
            } else {
                return back()->with(['success' => 'Item quantity updated']);
            }
        }

        if($request->wantsJson()){            
            return response()->json([
                'success' => false,
                'message' => "Variant {$request->variant_id} not found in cart"
            ]);
        }

        return back()->with(['error' => 'Item not found in cart']);
    }

    public function bulkupdate(Request $request)
    {
        $user = Auth::user();

        $parsed_cartitems = $this->parse_cartitems($request);

        foreach ($parsed_cartitems as $item) {
            $user->cart_update($item['id'], $item['quantity']);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Variants updated in cart"
            ]);
        } else {
            return back()->withErrors(['success' => 'Item quantities updated']);
        }
    }

    public function remove(Request $request, Variant $variant)
    {

        $user = Auth::user();

        if ($user->cart_remove($variant->id)) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => "Variant {$variant->id} removed from cart"
                ]);
            }

            return back()->withErrors(['success' => "Item removed from cart"]);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => "Variant {$request->variant_id} not found in cart"
            ]);
        }

        return back()->withErrors(['error' => "Failed to remove item from cart"]);
    }
}
