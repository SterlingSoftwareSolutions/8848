@extends('layouts.admin') @section('content')

<div class="ms-5 me-10">
    {{-- 4 ICONS --}}
    <div class="flex gap-4 mt-10 ">

        <div class="w-full border-2 border-blue-200 rounded-lg md:w-3/12 hover:bg-blue-300 hover:text-white">
            <img class="mx-auto border-green-500" src="{{ asset('images/customer.png') }}" />
            <p class="text-3xl text-center text-blue-500">{{number_format($customer_count)}}</p>
            <p class="text-center text-blue-500 text-md">Customers</p>
        </div>

        <div class="w-full border-2 border-blue-200 rounded-lg md:w-3/12 hover:bg-blue-300 hover:text-white">
            <img class="mx-auto border-green-500" src="{{ asset('images/package.png') }}" />
            <p class="text-3xl text-center text-blue-500 ">{{ number_format($product_count)}}</p>
            <p class="text-center text-blue-500 text-md ">Products</p>
        </div>

        <div class="w-full border-2 border-blue-200 rounded-lg md:w-3/12 hover:bg-blue-300">
            <img class="mx-auto border-green-500" src="{{ asset('images/delivery-truck.png') }}" />
            <p class="text-3xl text-center text-blue-500">{{number_format($order_count)}}</p>
            <p class="text-center text-blue-500 text-md">Orders</p>
        </div>

        <div class="w-full border-2 border-blue-200 rounded-lg md:w-3/12 hover:bg-blue-300 hover:text-white">
            <img class="mx-auto border-green-500" src="{{ asset('images/data-analytics.png') }}" />
            <p class="text-3xl text-center text-blue-500">${{number_format($order_total)}}</p>
            <p class="text-center text-blue-500 text-md">Total Sales</p>
        </div>
    </div>

    <div class="flex gap-4">
            <!-- Box 1: Customer List -->
            <div class="text-blue-700 w-full">
                <h1 class="text-xl my-4">Latest Customers</h1>
                <div class="flex flex-row p-5 bg-gray-200 rounded">
                    <p class="w-[30%]">Customer Name</p>
                    <p class="w-[30%]">Customer Type</p>
                    <p class="w-[30%]">Priority Level</p>
                    <p class="w-[10%]">Action</p>
                </div>
                <!-- Placeholder Content for Box 1 -->

                @foreach($customers as $customer)
                <div class="flex p-5 border-b-2 border-gray-300">
                    <p class="w-[30%]">{{$customer?->first_name}} {{$customer?->last_name}}</p>
                    <div class="w-[30%]">
                        {{$customer->is_retail() ? 'Retail' : null}}
                        {{$customer->is_wholesale() ? 'Wholesale' : null}}
                    </div>
                    <div class="w-[30%]">
                        {{ucwords($customer?->priority)}}
                    </div>
                    <a href="/admin/users/{{$customer->id}}/edit" class="w-[10%]">
                        <img class="px-2 py-2 bg-black rounded-lg" src="{{ asset('images/edit.png') }}" />
                    </a>
                </div>
                @endforeach
                <a href="/admin/users" class="w-full flex justify-center">
                    <button class="mt-4">View All</button>
                </a>
            </div>

            <div class="text-blue-700 w-full">
                <h1 class="text-xl my-4">Latest Orders</h1>
                <div class="flex flex-row py-5 bg-gray-200 rounded">
                    <p class="w-[30%] px-2">Customer Name</p>
                    <p class="w-[30%]">Date</p>
                    <p class="w-[15%]">Items</p>
                    <p class="w-[15%]">Total</p>
                    <p class="w-[10%]">Action</p>
                </div>

                @foreach($orders as $order)
                <div class="flex flex-row py-5 border-b-2 border-gray-300">
                    <p class="w-[30%] px-2">
                        @if($order->user)
                            {{$order->user?->first_name}} {{$order->user?->last_name}}
                        @else
                            <div class="text-red-500">No User</div>
                        @endif
                    </p>
                    <div class="w-[30%]">
                        <h1>{{ \Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</h1>
                    </div>
                    <div class="w-[15%]">
                        <h1>{{$order->items->count()}} Item{{$order->items->count() == 1 ? '' : 's'}}</h1>
                    </div>
                    <div class="w-[15%]">
                        <h1>${{$order->total()}}</h1>
                    </div>
                    <a href="/admin/orders/{{$order->id}}/edit" class="w-[10%]">
                        <img class="px-2 py-2 mx-auto bg-black rounded-lg" src="{{ asset('images/edit.png') }}" />
                    </a>
                </div>
                @endforeach

                <a href="/admin/orders" class="w-full flex justify-center">
                    <button class="mt-4">View All</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection