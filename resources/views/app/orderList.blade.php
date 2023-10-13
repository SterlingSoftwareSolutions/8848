@extends('layouts.app') @section('content')
<div class="md:mb-5">

    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        <div class="flex justify-between w-full">

        </div>
    </div>
    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        <div class="flex justify-between w-full">
            
<form class="flex items-center gap-5">   
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
            </svg>
        </div>
        <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full pl-10 p-2.5  " placeholder="Search branch name..." required>
    </div>
    <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-900 rounded-lg border hover:bg-blue-800 focus:ring-4 focus:outline-none">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Search</span>
    </button>
    <div class="w-1/2 pr-5">
        <select id="customer_type" class="p-2 border rounded ">
            <option value="wholesale">Wholesale Customer</option>
            <option value="retail">Retail Customer</option>
        </select>
    </div>
    <div class="w-1/2 pr-5">
        <select id="customer_type" class="p-2 border">
            <option value="wholesale">High</option>
            <option value="wholesale">Medium</option>
            <option value="retail">Low</option>
        </select>
    </div>
</form>

            <a href="">

                <h1 class="px-2 py-2 text-center text-white bg-blue-900 rounded-lg ">New Order</h1>
            </a>
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
            <div class="flex flex-row items-center p-5">
              
                <p class="w-[10%]">#</p>
              
                <div class="w-[10%]">

                </div>
              
                <div class="w-[15%]">

                </div>
              
                <div class="w-[10%]">

                    {{-- <label class="px-2 py-2 mx-auto text-center text-yellow-600 bg-yellow-200 rounded-lg"><span
                        class="ml-2 mr-2">Pending</span>
                    </label>


                  <label class="px-2 py-2 mx-auto text-center text-green-600 bg-green-200 rounded-lg"><span
                      class="ml-4 mr-4">Paid</span>
                  </label>

              

                    <label class="px-2 py-2 mx-auto text-center text-red-600 bg-red-200 rounded-lg"><span
                        class="ml-2 mr-2">unpaid</span>
                    </label>

              

                    <label class="px-2 py-2 mx-auto text-center text-gray-600 bg-gray-200 rounded-lg"><span
                        class="ml-1 mr-1"></span>
                    </label> --}}

                </div>
              
                <div class="w-[10%]">

                </div>
              
                <div class="w-[10%]">
                  0%
                </div>
              
                <div class="w-[10%]">

                </div>
              
                <div class="md:flex flex-row gap-1 w-[20%] mx-1">
                  <div class="w-40">
                    <h1 class="px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Cancel </h1>
                  </div>
                  <div class="w-40">
                    <a href="/admin/orders//edit"><h1 class="px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </h1></a>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection