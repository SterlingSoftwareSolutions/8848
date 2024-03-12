@extends('layouts.app', [
'title' => 'Home',
'fullwidth' => true
])

@props([
'category' => null
])

@section('content')

<div class="relative bg-white shadow-2xl carousel">
    <div class="relative w-full overflow-hidden carousel-inner">
        <!--Slide 1-->
        <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
        <div class="absolute flex flex-col opacity-0 carousel-item h-[400px] md:h-[600px] w-full" style="background-image: url('images/home-bg.jpg'); background-size: 100% auto; background-repeat: no-repeat; display: flex; justify-content: center; align-items: center; background-position: 25%;">
            <!-- content for slide 1 -->
            <div class=" w-[1150px]">
                <div class="text-[30px] md:text-5xl text-[#166eb6] font-bold">Clean, Protect, Plan</div>
                <div class="mt-5 mb-8 text-[18px] md:text-4xl text-xl text-gray-600 text-center md:text-left font-bold">Explore our diverse range of<br> <span class="text-[#166eb6]">Cleaning and Packaging </span> Solutions</div>
                <a href="{{ url('categories') }}" class="p-3 mt-5 justify-start bg-gradient-to-b from-[#166EB6] to-[#284297] text-white">Check out our products</a>
            </div>
        </div>

        <label for="carousel-3" class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-1 md:ml-10 hover:text-white hover:bg-blue-700">‹</label>
        <label for="carousel-2" class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-1 md:mr-10 hover:text-white hover:bg-blue-700">›</label>

        <!--Slide 2-->
        <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
        <div class="absolute flex flex-col opacity-0 carousel-item h-[400px] md:h-[600px] w-full" style="background-image: url('images/background.jpg'); background-size: 100% auto; background-repeat: no-repeat; display: flex; justify-content: center; align-items: center; background-position: 25%;">
            <!-- content for slide 2 -->
            <div class="md:w-[1150px] md:mx-0 mx-4">
                <div class=" text-sm md:text-5xl text-[#166eb6] font-bold">Eco-friendly Packaging Solutions</div>
                <div class="mt-1 mb-8 text-[18px] md:text-4xl text-xl text-gray-600 md:text-left font-bold">Browse our innovative range of plastic-free packaging made from sugarcane bamboo</div>
                @auth
                    <a href="{{ url('categories') }}" class="p-3 mt-5 justify-start bg-gradient-to-b from-[#166EB6] to-[#284297] text-white">Check out our products</a>
                @else
                    <a href="{{ url('register') }}" class="p-3 mt-5 justify-start bg-gradient-to-b from-[#166EB6] to-[#284297] text-white">Check out our products</a>
                @endauth
            </div>
        </div>

        <label for="carousel-1" class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-2 md:ml-10 hover:text-white hover:bg-blue-700">‹</label>
        <label for="carousel-3" class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-2 md:mr-10 hover:text-white hover:bg-blue-700">›</label>

        <!--Slide 3-->
        <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
        <div class="absolute flex flex-col opacity-0 carousel-item h-[400px] md:h-[600px] w-full" style="background-image: url('images/food-packages-frame-delivery-concept.jpg'); background-size: 100% auto; background-repeat: no-repeat; display: flex; justify-content: center; align-items: center; background-position: 25%;">
            <!-- content for slide 3 -->
            <div class="md:w-[1150px] md:mx-0 mx-4">
                <div class=" text-[20px] md:text-5xl text-[#166eb6] font-bold">Create an account with us today!</div>
                <div class="mt-1 mb-8 text-[18px] md:text-4xl text-xl text-gray-600  md:text-left font-bold">All your cleaning needs organised in a click</div>
                @auth
                    <a href="{{ url('categories') }}" class="p-3 mt-5 justify-start bg-gradient-to-b from-[#166EB6] to-[#284297] text-white">Check out our products</a>
                @else
                    <a href="{{ url('register') }}" class="p-3 mt-5 justify-start bg-gradient-to-b from-[#166EB6] to-[#284297] text-white">Sign up now</a>
                @endauth
            </div>
        </div>
        <label for="carousel-2" class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-3 md:ml-10 hover:text-white hover:bg-blue-700">‹</label>
        <label for="carousel-1" class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-3 md:mr-10 hover:text-white hover:bg-blue-700">›</label>

        <!-- Add additional indicators for each slide-->
        <ol class="carousel-indicators">
            <li class="inline-block mr-3">
                <label for="carousel-1" class="block text-4xl text-white cursor-pointer carousel-bullet hover:text-blue-700">•</label>
            </li>
            <li class="inline-block mr-3">
                <label for="carousel-2" class="block text-4xl text-white cursor-pointer carousel-bullet hover:text-blue-700">•</label>
            </li>
            <li class="inline-block mr-3">
                <label for="carousel-3" class="block text-4xl text-white cursor-pointer carousel-bullet hover:text-blue-700">•</label>
            </li>
        </ol>
    </div>
</div>


<!-- Category Section -->
<div class="w-full bg-gradient-to-b from-[#166EB6] to-[#284297]">
    <div class="flex flex-col py-5 md:flex-row">
        <!-- Mug Image -->
        <div class="relative md:w-2/12">
            <div class="absolute inset-0 -mt-24 bg-opacity-50 bg-no-repeat md:-ml-36" style="background-image: url('{{ asset('images/jug-image.png') }}'); opacity: 0.5;"></div>
        </div>

        <!-- Text -->
        <div class="flex flex-col items-center justify-center md:w-3/12">
            <div class="ml-5">
                <h1 class="mb-5 text-4xl text-white">Browse our best sellers</h1>
                <p class="mb-5 text-white">From top-notch cleaning supplies to innovative food packaging, these products are a testament to excellence</p>
                {{-- <div class="flex items-center justify-center md:items-start md:justify-start">
                    <a href="/categories" class="text-blue-600 bg-white font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2 uppercase flex md:justify-center md:items-center hover:bg-blue-300">shop now</a>
                </div> --}}
            </div>
        </div>

        <!-- Categories -->
        <div class="w-full md:w-7/12">
            <div class="flex flex-col justify-center gap-5 ml-10 md:flex-row md:ml-20 md:mr-10">
                <!-- Product Boxes (Responsive Grid) -->
                @foreach(array_chunk($categories->toArray(), 3) as $categoryGroup)
                <div class="w-10/12 h-full rounded-md md:w-1/3">
                    @php $categoryCounter = 0 @endphp <!-- Initialize a counter -->
                    @foreach($categoryGroup as $category)
                    @if ($categoryCounter < 1) <!-- Only display the first four categories -->
                        <!-- Product Image -->
                        <a href="/products?category_id={{ $category['id'] }}">
                            <div class="relative group categoty-angle">
                                <!-- Original image -->
                                <div class="relative">
                                    <!-- Original Image -->
                                    <img src="{{ $category['Background'] }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                                    <!-- Overlay Image and Text -->
                                    <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                                        <!-- Text (You can customize this) -->
                                        <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                                            {{ $category['name'] }}
                                        </div>
                                    </div>
                                </div>
                                <!-- Hover image (Initial) -->
                                <div class="hover-image">
                                    <img src="{{ $category['Background'] }}" alt="Hover Image" class="hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-50">

                                    <!-- Icon and text -->
                                    <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                                        <!-- Middle Image (Hover) -->
                                        <div class="text-xl font-semibold category_name2">
                                            {{ $category['name'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @php $categoryCounter++ @endphp <!-- Increment the counter -->
                        @endif
                        @endforeach
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>


<!-- End Section -->
<div class="flex flex-col bg-white">
    <!-- Text -->
    <div class="text-center">
        <h1 class="my-5 text-2xl tracking-wide text-blue-500">Secure And Organize</h1>
        <h1 class="my-5 text-3xl font-bold tracking-wide text-blue-500">We are ECOM Supplies</h1>
        <p class="my-5 text-lg font-light tracking-wider text-gray-600 md:mx-12">With five years of excellence, ECOM Supplies is a leading provider in cleaning supplies and food packaging. Serving top names in hospitality, our commitment to quality and innovation ensures pristine environments and flawlessly packaged culinary experiences. Experience the pinnacle of excellence with ECOM Supplies</p>
    </div>

    <!-- Icons -->
    <div class="py-4  w-9/12  mx-auto bg-[#4b98d82f] flex flex-col md:flex-row  justify-around md:py-10 md:px-10">
        <div class="flex flex-col items-center justify-center md:flex-row">
            <div class="flex flex-col items-center w-1/3 ">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-20 h-20">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1 class=" text-[20px] md:text-[30px] text-blue-700 md:w-full">Quick Delivery</h1>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center md:flex-row ">
            <div class="flex flex-col items-center w-1/3">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-20 h-20">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1 class=" text-[20px] md:text-[30px]  text-blue-700 md:w-full">Secure Payment</h1>
                </div>

            </div>

        </div>
        <div class="flex flex-col items-center justify-center md:flex-row md:border-l-2">
            <div class="flex flex-col items-center w-1/3">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-20 h-20">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.746 3.746 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1 class=" text-[20px] md:text-[30px] text-blue-700 md:w-full">Best Quality</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection