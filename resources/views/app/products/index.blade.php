@extends('layouts.app')
@section('content')
{{-- Main Image --}}
<div class="relative">
    <div
        class="bg-cover h-72 md:h-96"
        style="background-image: url('{{
            asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg')
        }}'); "
    ></div>
    <div class="absolute inset-0 flex items-center justify-center">
        <h1 class="text-3xl font-bold text-white underline md:text-4xl">
            8848 Text Product 2
        </h1>
    </div>
</div>
<div class="flex flex-col justify-center mt-4 md:flex-row md:mt-4">
    <!-- Image Box 1 -->
    <div class="w-full px-4 rounded-md md:w-1/3">
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[150px] object-cover rounded-md">
        <h1 class="text-center text-lg text-[#1670B7] font-semibold p-2">Containers</h1>
    </div>

    <!-- Image Box 2 -->
    <div class="w-full px-4 rounded-md md:w-1/3">
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[150px] object-cover rounded-md">
        <h1 class="text-center text-lg text-[#1670B7] font-semibold p-2">Cups & Accessories</h1>
    </div>

    <!-- Image Box 3 -->
    <div class="w-full px-4 rounded-md md:w-1/3">
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[150px] object-cover rounded-md">
        <h1 class="text-center text-lg text-[#1670B7] font-semibold p-2">Plates, Bowls & Trays</h1>
    </div>
</div>

<div class="grid justify-center grid-cols-1 gap-5 p-5 md:grid-cols-4">

    @foreach($products as $product)
            <x-product-card :product="$product"/>
    @endforeach

</div>


@endsection