@extends('layouts.app')
@section('content')

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