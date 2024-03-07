@extends('layouts.admin') @section('content')
<div class="md:mb-5">

    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        <div class="flex justify-between w-full md:mt-5">

        </div>
    </div>
    <div class="flex flex-col items-center gap-2 mx-2  md:flex-row md:mx-10 ">
        <div class="flex justify-between w-full">
            <form class="flex gap-4 items-center">
                <input name="search" type="text" value="{{$_GET['search'] ?? null}}" class="px-4 bg-white rounded h-12 border border-blue-900" placeholder="Order Id ...">

                <button type="submit" class="p-4 text-white rounded bg-blue-900">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                <select name="status"class="px-4 bg-white rounded h-12 border border-blue-900" onchange="this.form.submit()">
                    <option value="">Any Status</option>
                    <option value="unverified" @if(($_GET['status'] ?? null) == 'unverified') selected @endif>Unverified</option>
                    <option value="pending" @if(($_GET['status'] ?? null) == 'pending') selected @endif>Pending</option>
                    <option value="processing" @if(($_GET['status'] ?? null) == 'processing') selected @endif>Processing</option>
                    <option value="shipped" @if(($_GET['status'] ?? null) == 'shipped') selected @endif>Shipped</option>
                    <option value="delivered" @if(($_GET['status'] ?? null) == 'delivered') selected @endif>Delivered</option>
                    <option value="returned" @if(($_GET['status'] ?? null) == 'returned') selected @endif>Returned</option>
                    <option value="canceled" @if(($_GET['status'] ?? null) == 'canceled') selected @endif>Canceled</option>
                    <option value="rejected" @if(($_GET['status'] ?? null) == 'rejected') selected @endif>Rejected</option>
                </select>

                <select name="order_type"class="px-4 bg-white rounded h-12 border border-blue-900" onchange="this.form.submit()">
                    <option value="">Any Type</option>
                    <option value="wholesale" @if(($_GET['order_type'] ?? null) == 'wholesale') selected @endif>Wholesale</option>
                    <option value="retail" @if(($_GET['order_type'] ?? null) == 'retail') selected @endif>Retail</option>
                </select>
            </form>
        </div>
    </div>
    {{-- End Dropdowns & Buttons Row --}}
    <div class="flex flex-col mx-2 border-2 md:mt-5 md:mx-10 ">

        <div class="text-blue-900">
            <div class="flex flex-row p-5 bg-gray-200">
                <p class="w-[10%]">Order ID</p>
                <p class="w-[10%]">Type</p>
                <p class="w-[10%]">Date</p>
                <p class="w-[10%]">Customer Name</p>
                <p class="w-[10%]">Status</p>
                <p class="w-[10%]">Items</p>
                <p class="w-[10%]">Discount</p>
                <p class="w-[10%]">Total</p>
                <p class="w-[20%]">Action</p>
            </div>
            @foreach($orders as $order)
            <x-order-row :order="$order" />
            @endforeach
            <div class="flex justify-center p-5">
                {{$orders->appends($_GET)->links()}}
            </div>
        </div>
    </div>
</div>
@endsection