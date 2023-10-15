<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- HEADER -->
    @include('layouts.app.header')

    <div class="container">
        {{-- Main Image --}}
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

        {{-- Sub Image & Description --}}
        <div class="w-11/12 mx-auto mt-5 md:w-9/12">
            <div class="flex flex-col gap-1 text-sm font-bold text-blue-800 md:flex-row md:text-2xl">
                <a href="">Home</a>
                <span>/</span>
                <a href="">{{ $product->category->name ?? null }}</a>
                <span>/</span>
                <span class="">{{ $product->title }}</span>
            </div>

            <div class="flex flex-col mt-5 md:flex-row">
                <div class="relative w-full md:w-6/12">
                    <img src="{{$product->image(1)}}" alt="Image Description" class="w-full" />

                    <!-- White circle with search icon -->
                    <div class="absolute flex items-center justify-center w-12 h-12 bg-white rounded-full cursor-pointer top-5 right-5"
                        onclick="openImage()">
                        <i class="fa fa-search" style="color: rgb(167, 36, 36)" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="w-full mt-5 md:w-6/12 md:mt-10 md:pl-5">
                    <p class="text-lg font-bold text-gray-400">CODE:{{ $product->sku }}</p>
                    <p class="mt-1 text-3xl font-bold text-blue-800">
                        {{ $product->title }}
                    </p>
                    <p class="mt-2 text-gray-700">
                        {{ $product->short_description }}
                    </p>
                    @if (auth()->user() && !auth()->user()->is_whsl_user())
                    <p class="mt-5 text-3xl font-bold text-blue-800">${{ $product->price() }}</p>
                    @endif
                    @if($product->in_stock && $product->variants->count() > 0)
                    <p class="text-lg text-blue-500 md:mt-5">In stock</p>
                    <form action="/cart/add" method="post">
                        @csrf
                        @if($product->variants->count() == 1)
                        <input type="hidden" name="variant_id" value="{{$product->variants[0]->id}}">
                        @else
                        <select name="variant_id" class="w-1/2 p-4 my-4">
                            @foreach($product->variants as $variant)
                            <option value="{{$variant->id}}">{{$variant->name}} - ${{auth()->user() && !auth()->user()->is_whsl_user() ? $variant->price : null}}</option>
                            @endforeach
                        </select>
                        @error('variant_id')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                        @endif
                        <!-- Product Quantity -->
                        <div class="flex gap-4">
                            <div
                                class="flex flex-row md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                                <!-- Decrease Button -->
                                <button type="button" data-action="decrement"
                                    class="w-8 h-10 text-gray-600 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400 md:h-full md:w-20">
                                    <span class="text-xl font-thin">−</span>
                                </button>
                                <!-- Input Field -->
                                <input type="number"
                                    class="flex items-center w-12 font-semibold text-center text-gray-700 outline-none cursor-default focus:outline-none md:w-full text-md md:text-base"
                                    name="quantity" min="1" value="1">
                                <!-- Increase Button -->
                                <button type="button" data-action="increment"
                                    class="w-8 h-10 text-gray-600 rounded-r cursor-pointer hover:text-gray-700 hover-bg-gray-400 md:h-full md:w-20">
                                    <span class="text-xl font-thin">+</span>
                                </button>
                            </div>
                            <button type="submit"
                                class="w-1/2 p-2 bg-gradient-to-b from-[#166EB6] to-[#284297] rounded-sm text-white hover:text-blue-500">ADD
                                TO CART</button>
                            @if(false)
                            <button type="button"
                                class="w-1/2 p-2 bg-gradient-to-b from-[#B6B6B6] to-[#979797] rounded-sm text-white hover:text-white-500"
                                disabled>CHOOSE AN OPTION</button>
                            @endif
                        </div>
                    </form>
                    @else
                    <p class="text-lg text-red-500 md:mt-5">@if($product->variants->count() > 0) Out of stock @else
                        Product has no options @endif</p>
                    @endif

                    <div class="horizontal-line md:mt-5"></div>

                    <p class="mt-5 text-lg font-bold text-gray-500">
                        Categories: {{ $product->category->name ?? null}}
                    </p>
                </div>
            </div>
        </div>
        {{-- End Sub Image & Description --}}

        {{-- Product Details --}}

        <div class="w-11/12 mx-auto mt-5 md:w-9/12">
            <div class="flex flex-row justify-center w-full gap-5">
                <div class="horizontal-line-2"></div>
                <p class="font-bold text-center text-blue-800 md:mt-5">
                    Product Details
                </p>
                <div class="horizontal-line-2"></div>
            </div>

            <p class="text-center md:mb-20">
                {{ $product->description }}
            </p>
        </div>

        {{-- End Product Details --}}
    </div>

    <!-- FOOTER -->
    @include('layouts.app.footer')
</body>

</html
