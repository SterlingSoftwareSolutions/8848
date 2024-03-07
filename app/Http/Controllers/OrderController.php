<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\OrderLog;
use App\Models\Variant;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * possible statuses
     */
    private $payment_statuses = ['unpaid', 'partial', 'paid', 'refunded'];
    private $order_statuses = ['unverified', 'pending', 'processing', 'shipped', 'delivered', 'returned', 'canceled', 'rejected', ];

    private function parse_orderitems(Request $request){
        $orderItems = [];

        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            $item_id = substr($key, strlen('item_price_'));

            if (isset($requestData['item_quantity_' . $item_id])) {
                $variant = [
                    'id' => $item_id,
                    'variant' => $requestData['item_variant_' . $item_id],
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
    public function index_client(Request $request)
    {
        $user = Auth::user();
        $orders = Order::query()->where('user_id', $user->id)->orderBy('created_at', 'desc');

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'orders' => $orders->get()->makeHidden(['items'])
            ]);
        }

        return view('app.orders.index', [
            'orders' => $orders->paginate(10)
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::query();

        if($request->status){
            $query->where('status', $request->status);
        }

        if($request->order_type){
            $query->where('order_type', $request->order_type);
        }

        if($request->search){
            $query->where('reference', 'LIKE', $request->search);
        }

        return view('admin.orders.index', [
            'orders' => $query->orderBy('created_at', 'desc')->paginate(10)
        ]);
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
    public function show_client(Order $order, Request $request)
    {
        if($order->user_id != Auth::user()->id){
            abort(404);
        }

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'order' => $order
            ]);
        }

        return view('app.orders.show', compact('order'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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
            'status' => ['required', 'in:' . implode(',', $this->order_statuses)],
            'payment_status' => ['required', 'in:' . implode(',', $this->payment_statuses)],
            'order_type' => ['required', 'in:wholesale,retail'],
        ]);

        // Log status change
        if($order->status != $request->status){
            OrderLog::create([
                'order_id' => $order->id,
                'status' => $request->status,
                'message' => 'Status updated'
            ]);
        }

        // Update items (wholesale only)
        if($order->items_editable()){            
            $items = $this->parse_orderitems($request);
            $item_ids = array_map(function ($item){
                return $item['id'][0] == 0 ? null : $item['id'];
            }, $items);

            $existing_item_ids = $order->items->pluck('id')->toArray();
            $items_to_delete = array_diff($existing_item_ids, $item_ids);

            // Delete items
            OrderItems::where('order_id', $order->id)->whereIn('id', $items_to_delete)->delete();

            foreach($items as $item){
                $orderItem = OrderItems::where('order_id', $order->id)->where('id', $item['id'])->first();
                if($orderItem){
                    $orderItem->update([
                        'price' => $item['price'] ?? 0,
                        'quantity' => $item['quantity'] ?? 1,
                    ]);
                } else{
                    OrderItems::create([
                        'order_id' => $order->id,
                        'variant_id' => $item['variant'],
                        'quantity' => $item['quantity'],
                        'full_price' => Variant::find($item['variant'])->price,
                        'price' => $item['price'],
                    ]);
                }
            }
        }

        // Update order
        $order->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status,
            'order_type' => $request->order_type
        ]);

        return back();
    }

    public function approve(Request $request, Order $order){
        $order->update([
            'status' => 'pending'
        ]);
        return back();
    }

    public function reject(Request $request, Order $order){
        $order->update([
            'status' => 'rejected'
        ]);
        return back();
    }

    public function print(Order $order)
    {
        $pdf = Pdf::loadView('pdf.invoice', compact('order'))->setPaper('a4', 'portrait');
        return $pdf->stream($order->reference);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
