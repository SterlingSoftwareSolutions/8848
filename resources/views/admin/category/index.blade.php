@extends('layouts.admin') @section('content')

<div class="md:mb-5">

    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">

        <div class="flex justify-between w-full">
            <form class="flex gap-5 items-center">   
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
                <div class="w-1/2 pr-5 -mt-4">
                    <label class="block text-gray-700 text-sm font-bold" for="username">
                        Category
                      </label>
                    <select id="customer_type" class=" p-2 border rounded-lg">
                        <option value="wholesale">Wholesale Customer</option>
                        <option value="retail">Retail Customer</option>
                    </select>
                </div>
                <div class="w-1/2 pr-5 -mt-4">
                    <label class="block text-gray-700 text-sm font-bold " for="username">
                        Sub Category
                      </label>
                    <select id="customer_type" class="p-2 border rounded-lg">
                        <option value="wholesale">High</option>
                        <option value="wholesale">Medium</option>
                        <option value="retail">Low</option>
                    </select>
                </div>
            </form>
            <h1 class="py-2 px-2 rounded-lg bg-blue-900 text-white text-center ">Add Product </h1>
        </div>
    </div>


    <div class="flex flex-col mx-2 border-2 md:mt-5 md:mx-10 ">
        <!-- Box 1: Customer List -->
        <div class="text-blue-900 ">
            <div class="flex flex-row py-5 bg-gray-200">
                <p class="w-[20%]"></p>
                <p class="w-[20%]">Category Name</p>
                <p class="w-[20%]">Sub Category</p>
                <p class="w-[20%]">Items</p>
                <p class="w-[15%]">Action</p>
            </div>
            <!-- Placeholder Content for Box 1 -->

            {{-- Table list 1  --}}
            <div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

                <div class="w-[5%] p-2">
                    <input type="checkbox" class="w-4 h-4 md:h-5 md:w-5" />
                </div>

                <div class="w-[20%]">
                    <img src="{{ asset('images/Rectangle 236.png') }}" alt="Image Description"  class="w-full">
                </div>


                <div class="w-[20%] ">
                    Sugarcane
                </div>

                <div class="w-[20%]">
                    4 Sub Categories
                </div>

                <div class="w-[20%]">
                    155 Items
                </div>


                <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">


                    <div class="w-[95px]">
                        <button class="w-full px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </button>
                    </div>
                    <div class="w-[95px]">
                        <button class="w-full px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</button>
                    </div>
                </div>
            </div>
            {{-- table list 2 --}}


            {{-- Table list 1  --}}
            <div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

                <div class="w-[5%] py-2 px-2">
                    <input type="checkbox" class="w-4 h-4 md:h-5 md:w-5" />
                </div>

                <div class="w-[20%]">
                    <img src="{{ asset('images/Rectangle 236.png') }}" alt="Image Description"  class="w-full">
                </div>


                <div class="w-[20%] ">
                    Sugarcane
                </div>

                <div class="w-[20%]">
                    4 Sub Categories
                </div>

                <div class="w-[20%]">
                    155 Items
                </div>


                <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">


                    <div class="w-[95px]">
                        <button class="w-full px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </button>
                    </div>
                    <div class="w-[95px]">
                        <button class="w-full px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</button>
                    </div>
                </div>
            </div>
            {{-- table list 2 --}}

        </div>



    </div>
</div>
</div>
@endsection