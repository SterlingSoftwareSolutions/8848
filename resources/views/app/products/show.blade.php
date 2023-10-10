@extends('layouts.app') @section('content')

<head>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
</head>

<div class="container min-w-fit">
    {{-- Main Image --}}
    <div class="relative">
        <div
            class="bg-cover h-72 md:h-96"
            style="background-image: url('{{
                $product->image_1_url
            }}'); "
        ></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-white font-bold text-3xl md:text-4xl underline">
                {{$product->title}}
            </h1>
        </div>
    </div>

    {{-- Sub Image & Description --}}
    <div class="w-11/12 mx-auto mt-5 md:w-9/12">
        <div
            class="flex flex-col md:flex-row text-blue-800 font-bold gap-1 text-sm md:text-2xl"
        >
            <a href="/">Home</a>
            <span>/</span>
            <a href="/products?category_id={{$product->category->id}}">{{$product->category->name ?? 'Unknown'}}</a>
            <span>/</span>
            <span class="">{{$product->title}}</span>
        </div>

        <div class="flex flex-col md:flex-row mt-5">
            <div class="w-full md:w-6/12 relative">
                <img
                    src="{{
                        $product->image_1_url
                    }}"
                    alt="Image Description"
                    class="w-full"
                />

                <!-- White circle with search icon -->
                <div
                    class="absolute top-5 right-5 bg-white rounded-full w-12 h-12 flex items-center justify-center cursor-pointer"
                    onclick="openImage()"
                >
                    <i
                        class="fa fa-search"
                        style="color: rgb(167, 36, 36)"
                        aria-hidden="true"
                    ></i>
                </div>
            </div>

            <div class="w-full md:w-6/12 mt-5 md:mt-10 md:pl-5">
                <p class="text-lg text-gray-400 font-bold">CODE:{{$product->sku}}</p>
                <p class="text-blue-800 font-bold text-3xl mt-1">
                    {{$product->title}}
                </p>
                <p class="text-gray-700 mt-2">
                    {{$product->short_description}}
                </p>
                <p class="text-blue-800 font-bold mt-5 text-3xl">${{$product->price}}</p>
                @if($product->in_stock)
                <p class="text-blue-500 md:mt-5 text-lg">In stock</p>
                @else
                <p class="text-red-500 md:mt-5 text-lg">Out of stock</p>
                @endif
                <div class="horizontal-line md:mt-5"></div>

                <p class="text-gray-500 text-lg mt-5 font-bold">
                    Category: {{$product->category->name ?? 'Unknown'}}
                </p>
            </div>
        </div>
    </div>
    {{-- End Sub Image & Description --}}

    {{-- Product Details  --}}

    <div class="w-11/12 mx-auto mt-5 md:w-9/12">
        <div class="w-full flex flex-row justify-center gap-5">
            <div class="horizontal-line-2"></div>
            <p class="text-center text-blue-800 font-bold md:mt-5">
                Product Details
            </p>
            <div class="horizontal-line-2"></div>
        </div>

        <p class="text-center md:mb-20">
            {{$product->description}}
        </p>
    </div>

    {{--  End Product Details  --}}
</div>
@endsection
