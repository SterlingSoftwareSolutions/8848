@extends('layouts.admin') @section('content')

<div class="md:mb-5">
    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        
        <div class="flex justify-between w-full md:mt-5">
            <form class="flex gap-4 items-center">
                <input name="q" type="text" value="{{$_GET['q'] ?? null}}" class="px-4 bg-white rounded h-12 border border-blue-900" placeholder="Order Id ...">

                <button type="submit" class="p-4 text-white rounded bg-blue-900">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                <select name="category_id"class="px-4 bg-white rounded h-12 border border-blue-900" onchange="this.form.submit()">
                    <option value="">Any Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(($_GET['category_id'] ?? null) == $category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>

                <select name="in_stock" class="px-4 bg-white rounded h-12 border border-blue-900" onchange="this.form.submit()">
                    <option value="">Any Stock Status</option>
                    <option value="0" @if(($_GET['in_stock'] ?? null) == '0') selected @endif>Out Of Stock</option>
                    <option value="1" @if(($_GET['in_stock'] ?? null) == '1') selected @endif>In Stock</option>
                </select>
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