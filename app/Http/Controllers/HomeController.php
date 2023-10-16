<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::with('children')->where('parent_id', null)->get();

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'categories' => $categories
            ]);
        }

        return view('app.home', compact('categories'));
    }

    public function admin_dashboard()
    {
        $customer_count = User::whereIn('role', ['client_retail', 'client_wholesale'])->count();
        $product_count = Product::count();
        $order_count = Order::count();
        $order_total = Order::all()->sum(function($order){
            return $order->total();
        });

        $orders = Order::latest()->take(5)->get();
        $customers = User::whereIn('role', ['client_retail', 'client_wholesale'])->latest()->take(5)->get();

        return view('admin.dashboard', compact([
            'customer_count',
            'product_count',
            'order_count',
            'order_total',
            'customers',
            'orders'
        ]));
    }
}
