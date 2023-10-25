<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\OrderLog;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyListController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->back();
        }

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'mylist' => $user->my_list
            ]);
        }

        return view('app.my-list')->withMyList($user->my_list()->paginate(10));
    }


    public function add(Product $product, Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $user = auth()->user();

            if (!$user) {
                return response()->json(['success' => false, 'cause' => 'authorization']);
            }

            $check_already_exsist = $user->my_list()->where('product_id', $product->id)->exists();


            if ($check_already_exsist) {
                return response()->json(['success' => false, 'cause' => 'exsist']);
            }

            if ($user->my_list()->create(['product_id' => $product->id])) {
                return response()->json(['success' => true, 'cause' => 'added']);
            }

            return response()->json(['success' => false, 'cause' => 'unknown']);
        }

        abort(404);
    }


    public function remove(Product $product, Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            abort(404);
        }

        $user->my_list()->where('product_id', $product->id)->delete();

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'message' => 'Product removed from MyList'
            ]);
        }

        return redirect()->back();
    }
}
