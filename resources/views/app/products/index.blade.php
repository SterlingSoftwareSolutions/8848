@extends('layouts.app')
@section('content')
<div class="relative w-screen">
    <div class="h-56 bg-cover md:h-96" style="background-image: url('{{
        asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg')
    }}'); "></div>
    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-80">
        <h1 class="text-2xl font-bold text-center text-white underline md:text-4xl">
            Product
        </h1>
    </div>
</div>
<div class="md:ml-[20%]">
    <div class="flex flex-col items-center mt-10 md:flex-row md:mt-4">
        <!-- Image Box 1 -->
        <div class="w-full px-4 rounded-md md:w-1/3">
            <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[150px] object-cover rounded-md">
            <h1 class="text-center text-lg text-[#1670B7] font-semibold p-2">Containers</h1>
        </div>

        <!-- Image Box 2 -->
        <div class="w-full px-4 mt-4 rounded-md md:w-1/3 md:mt-0">
            <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[150px] object-cover rounded-md">
            <h1 class="text-center text-lg text-[#1670B7] font-semibold p-2">Cups & Accessories</h1>
        </div>

        <!-- Image Box 3 -->
        <div class="w-full px-4 mt-4 rounded-md md:w-1/3 md:mt-0">
            <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[150px] object-cover rounded-md">
            <h1 class="text-center text-lg text-[#1670B7] font-semibold p-2">Plates, Bowls & Trays</h1>
        </div>
    </div>
</div>

<div class="grid justify-center grid-cols-1 gap-5 p-5 md:grid-cols-4">
    @foreach($products as $product)
    <x-product-card :product="$product" />
    @endforeach
</div>


@endsection