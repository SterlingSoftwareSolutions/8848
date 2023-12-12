@props([
    'category' => null,
    'products' => null
])

@extends('layouts.app', [
    'title' => $category ? $category->name : 'Products',
    'fullwidth' => true
])

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="container min-w-fit">
    {{-- Main Image --}}
    <div class="relative w-screen">
        <div class="h-56 bg-cover md:h-[70vh] bg-fixed"
            style="background-image: url('{{ $category->background ?? asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}'); ">
        </div>
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40">
            <h1 class="text-2xl font-bold text-center text-white md:text-5xl drop-shadow-2xl">
                {{$category ? $category->name : 'Products'}}
            </h1>
        </div>
    </div>
    <div class="max-w-screen-xl mx-auto p-8">

        @if($category)
            <div class="grid grid-cols-1 px-3 gap-5 md:grid-cols-6 mb-8">
                @foreach($category->children as $subcategory)
                <x-category-card :category="$subcategory" />
                @endforeach
            </div>
        @endif

        <div>
            <div class="grid items-center grid-cols-1 gap-5 md:grid-cols-4">
                @foreach($products as $product)
                <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
        <div class="flex justify-center p-5">
            {{$products->appends($_GET)->links()}}
        </div>
    </div>
</div>
@endsection