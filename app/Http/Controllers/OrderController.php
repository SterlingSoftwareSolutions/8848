<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private function parse_orderitems(Request $request){
        $orderItems = [];

        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            $item_id = substr($key, strlen('item_price_'));

            if (isset($requestData['item_quantity_' . $item_id])) {
                $variant = [
                    'id' => $item_id,
                    'price' => $requestData['item_price_' . $item_id],
                    'quantity' => $requestData['item_quantity_' . $item_id]
                ];

                $orderItems[] = $variant;
            }
        }

        return $orderItems;
    }

    /**
     * Display a listing of the resource.
     */
    public function index_client()
    {
        $user = Auth::user();
        $orders = Order::query()->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('app.orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::query()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.orders.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required',
            'payment_status' => 'required',
        ]);

        $order->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status
        ]);

        $items = $this->parse_orderitems($request);

        foreach($items as $item){
            $orderItem = OrderItems::where('order_id', $order->id)->where('id', $item['id'])->first();
            if($orderItem){
                $orderItem->update([
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ]);
            }
        }

        return redirect('/admin/orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
