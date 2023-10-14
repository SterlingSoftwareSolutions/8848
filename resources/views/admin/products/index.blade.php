@extends('layouts.admin') @section('content')

<div class="md:mb-5">
    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        
        <div class="flex justify-between w-full md:mt-5">
            <form class="flex gap-5 items-center">   
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
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
                    <select id="parent_category" class=" p-2 border rounded-lg">
                        <option value="wholesale">Wholesale Customer</option>
                        <option value="wholesale">Product 1</option>
                        <option value="wholesale">Product 2</option>
                        <option value="retail">Retail Customer</option>
                    </select>
                </div>
                <div class="w-1/2 pr-5 -mt-4">
                    <label class="block text-gray-700 text-sm font-bold " for="username">
                        Sub Category
                      </label>
                    <select id="sub_category" class="p-2 border rounded-lg">
                        <option value="wholesale">High</option>
                        <option value="wholesale">Pro 1</option>
                        <option value="wholesale">Pro 2</option>
                        <option value="wholesale">Medium</option>
                        <option value="retail">Low</option>
                    </select>
                </div>
            </form>
            <a href="/admin/products/create">
                <h1 class="text-center text-white bg-blue-900 rounded-lg px-4 py-3 h-12 w-40">Add Product</h1>
            </a>
        </div>
    </div>
    

    <div class="flex flex-col mx-2 border-2 md:mt-5 md:mx-10 ">

        <!-- Box 1: Customer List -->
        <div class="text-blue-900 ">
            <div class="flex flex-row py-5 bg-gray-200">
                <p class="w-[12%]"></p>
                <p class="w-[20%]">Product Name</p>
                <p class="w-[15%]">Category</p>
                <p class="w-[15%]">Sub Category</p>
                <p class="w-[10%]">Stock</p>
                <p class="w-[10%]">Price</p>
                <p class="w-[15%]">Action</p>
            </div>
            <!-- Placeholder Content for Box 1 -->

            @foreach($products as $product)
            {{-- Table list 1  --}}
            <x-product-row :product="$product" />
            {{-- table list 2 --}}
            @endforeach
            <div class="flex justify-center p-5">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
@endsection