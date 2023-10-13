@extends('layouts.admin') @section('content')

<div class="md:mb-5">
    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        <div class="flex justify-between w-full">
            <a href="/admin/products/create">
                <h1 class="px-2 py-2 text-center text-white bg-blue-900 rounded-lg ">Add Product</h1>
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
</div>
@endsection