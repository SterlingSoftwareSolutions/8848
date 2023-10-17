@extends('layouts.app', [
    'title' => 'Order ' . $order->reference,
    'parent' => ['name' => 'Orders', 'url' => '/orders']
])

@section('content')
{{-- End Dropdowns & Buttons Row --}}
<div class="flex flex-col border-2 rounded-lg">
    <div class="flex flex-row text-gray-700 gap-8 items-center rounded-lg p-5 bg-gray-100">
        <div class="text-start flex items-center gap-4">
            <div class="font-semibold">Status:</div>
            <x-order-status :status="$order->status" />
        </div>
        <div class="text-start flex items-center gap-4">
            <div class="font-semibold">Payment Status:</div>
            <x-payment-status :status="$order->payment_status" />
        </div>
        <div class="text-start flex items-center gap-4 ms-auto">
            <b class="font-semibold">Date:</b> {{$order->created_at}}
        </div>
        @if(Auth::user()->is_wholesale())
        <div>
            <a href="/orders/{{$order->id}}/reorder"><button class="bg-blue-800 text-white font-semibold p-3 rounded-lg">Re-order</button></a>
        </div>
        @endif
    </div>
</div>

<div class="flex flex-col border-2 rounded-lg mt-4">
    <div class="text-blue-900">
        <div class="flex flex-row p-5 bg-gray-100">
            <p class="w-1/6 text-start font-semibold">Product</p>
            <p class="w-2/6 text-start font-semibold"></p>
            @if (!auth()->user()->is_wholesale())
            <p class="w-1/6 text-start font-semibold">Price</p>
            <p class="w-1/6 text-start font-semibold">Custom Price</p>
            <p class="w-1/6 text-start font-semibold">Quantity</p>
            @endif
            @if (!auth()->user()->is_wholesale())
            <p class="w-1/6 text-start font-semibold">Subtotal</p>
            @endif
        </div>
        @if($order->items->count() < 1) <div class="flex flex-row items-center p-5">
            <div class="w-full text-center py-12">This order has no products</div>
    </div>
    @else
    <!-- Order items -->
    @foreach($order->items as $item)
    <x-order-item-row :item="$item" :admin="false"/>
    @endforeach
    @endif
</div>
</div>

<div class="flex flex-col border-2 rounded-lg mt-4">
    <div class="text-blue-900">
        <div class="flex flex-row justify-end p-5 bg-gray-100">
            <p class="w-5/6 text-start font-semibold"></p>
            <div class="w-1/6 text-start font-semibold">
                Items: <br>
                <p class="text-xl">{{$order->items->sum('quantity')}}</p>
            </div>
            @if(!Auth::user()->is_wholesale())
            <div class="w-1/6 text-start font-semibold">
                Total: <br>
                <p class="text-xl">${{$order->total()}}</p>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="flex flex-row gap-4 mt-4">
    <div class="w-6/12 border-2 rounded-lg">
        <p class="font-bold px-5 pt-5">Billing Address</p>

        <div class="p-5 flex gap-4">
            <div>
                <p><b>First Name:</b> {{$order->billing_first_name}}</p>
                <p><b>Last Name:</b> {{$order->billing_last_name}}</p>
                <p><b>Phone:</b> {{$order->billing_phone}}</p>
                <p><b>Company:</b> {{$order->billing_company}}</p>
                <p><b>Address:</b> {{$order->billing_address_line_1}}</p>
                <p>{{$order->billing_address_line_2}}</p>
            </div>
            <div>
                <p><b>City:</b> {{$order->billing_city}}</p>
                <p><b>ZIP:</b> {{$order->billing_zip}}</p>
                <p><b>State:</b> {{$order->billing_state}}</p>
            </div>
        </div>
    </div>

    <div class="w-6/12 border-2 rounded-lg">
        <p class="font-bold px-5 pt-5">Shipping Address</p>
        <div class="p-5 flex gap-4">
            <div>
                <p><b>First Name:</b> {{$order->shipping_first_name}}</p>
                <p><b>Last Name:</b> {{$order->shipping_last_name}}</p>
                <p><b>Phone:</b> {{$order->shipping_phone}}</p>
                <p><b>Company:</b> {{$order->shipping_company}}</p>
                <p><b>Address:</b> {{$order->shipping_address_line_1}}</p>
                <p>{{$order->shipping_address_line_2}}</p>
            </div>
            <div>
                <p><b>City:</b> {{$order->shipping_city}}</p>
                <p><b>ZIP:</b> {{$order->shipping_zip}}</p>
                <p><b>State:</b> {{$order->shipping_state}}</p>
            </div>
        </div>
    </div>
</div>
@endsection