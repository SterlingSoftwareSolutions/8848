@extends('layouts.app', ['title' => 'Orders'])
@section('content')
{{-- End Dropdowns & Buttons Row --}}
<div class="flex flex-col border-2 rounded-lg">
    <div class="text-blue-900">
        <div class="flex flex-row p-5 bg-gray-100">
            <p class="w-1/6 text-start font-semibold">Order ID</p>
            <p class="w-1/6 text-start font-semibold">Date</p>
            <p class="w-1/6 text-start font-semibold">Status</p>
            <p class="w-1/6 text-start font-semibold">Items</p>
            @if (!auth()->user()->is_wholesale())
            <p class="w-1/6 text-start font-semibold">Total</p>
            @endif
            <p class="w-1/6 text-start font-semibold">Action</p>
        </div>
        @if($orders->count() < 1) <div class="flex flex-row items-center p-5">
            <div class="w-full text-center py-12">You don't have any orders</div>
    </div>
    @else
    <!-- ORDERS -->
    @foreach($orders as $order)
    <x-order-row-client :order="$order" />
    @endforeach
    @endif
    <div class="flex justify-center p-5">
        {{$orders->appends($_GET)->links()}}
    </div>
</div>
</div>
@endsection