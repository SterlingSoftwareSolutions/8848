@extends('layouts.admin') @section('content')
<div class="md:mb-5">

    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        <div class="flex justify-between w-full md:mt-5">

        </div>
    </div>
    <div class="flex flex-col items-center gap-2 mx-2  md:flex-row md:mx-10 ">
        <div class="flex justify-between w-full">

            <form class="flex gap-5 items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full pl-10 p-2.5  " placeholder="Search branch name..." required>
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-900 rounded-lg border hover:bg-blue-800 focus:ring-4 focus:outline-none">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
                <div class="w-1/2 pr-5 -mt-4">
                    <label class="block text-gray-700 text-sm font-bold" for="username">
                        Status
                    </label>
                    <select id="order_status" class=" p-2 border rounded-lg">
                        <option value="wholesale">Wholesale Customer</option>
                        <option value="wholesale">Order 1</option>
                        <option value="wholesale">Order 2</option>
                        <option value="retail">Retail Customer</option>
                    </select>
                </div>
                <div class="w-2/3 pr-5 -mt-4">
                    <label class="block text-gray-700 text-sm font-bold " for="username">
                        Payment Status
                    </label>
                    <select id="payment_status" class="p-2 border rounded-lg">
                        <option value="wholesale">High</option>
                        <option value="wholesale">Order 1</option>
                        <option value="wholesale">Order 2</option>
                        <option value="wholesale">Medium</option>
                        <option value="retail">Low</option>
                    </select>
                </div>
            </form>
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
            <x-order-row :order="$order" />
            @endforeach
            <div class="flex justify-center p-5">
                {{$orders->links()}}
            </div>
        </div>
    </div>
</div>
@endsection