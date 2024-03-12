<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\OrderLog;
use App\Models\Variant;
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


    public function add(Variant $variant, Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $user = auth()->user();

            if (!$user) {
                return response()->json(['success' => false, 'cause' => 'authorization']);
            }

            $check_already_exists = $user->my_list()->where('variant_id', $variant->id)->exists();

            if ($check_already_exists) {
                return response()->json(['success' => false, 'cause' => 'exsist']);
            }


            if ($user->my_list()->create(['variant_id' => $variant->id])) {
                return response()->json(['success' => true, 'cause' => 'added']);
            }

            return response()->json(['success' => false, 'cause' => 'unknown']);
        }

        abort(404);
    }


    public function remove(variant $variant, Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            abort(404);
        }

        $user->my_list()->where('variant_id', $variant->id)->delete();

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'message' => 'variant removed from MyList'
            ]);
        }

        return redirect()->back();
    }
}
