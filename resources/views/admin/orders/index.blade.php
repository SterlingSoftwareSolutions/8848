@extends('layouts.admin') @section('content')
<div class="md:mb-5">

    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        <div class="flex justify-between w-full">

            <h1 class="px-2 py-2 text-center text-white bg-blue-900 rounded-lg ">New Order</h1>
        </div>
    </div>
    {{-- End Dropdowns & Buttons Row --}}
    <div class="flex flex-col mx-2 border-2 md:mt-5 md:mx-10 ">

        <div class="text-blue-900">
            <div class="flex flex-row p-5 bg-gray-200">
                <p class="w-[15%]">Number</p>
                <p class="w-[10%]">Date</p>
                <p class="w-[15%]">Customer Name</p>
                <p class="w-[10%]">Status</p>
                <p class="w-[10%]">Items</p>
                <p class="w-[10%]">Discount</p>
                <p class="w-[10%]">Total</p>
                <p class="w-[20%]">Action</p>
            </div>
            @foreach($orders as $order)
            <x-order-row :order="$order"/>
            @endforeach
            <div class="flex justify-center p-5">
                {{$orders->links()}}
            </div>
        </div>
    </div>
</div>
@endsection