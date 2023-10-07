@extends('layouts.app')
@section('content')

<div class="flex flex-col md:flex-row justify-center">
    <!-- Image Box 1 -->
    <div class="w-full md:w-1/3 px-4 rounded-md">
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[150px] object-cover rounded-md">
        <h1 class="text-center text-lg text-[#1670B7] font-semibold p-2">Containers</h1>
    </div>

    <!-- Image Box 2 -->
    <div class="w-full md:w-1/3 px-4 rounded-md">
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[150px] object-cover rounded-md">
        <h1 class="text-center text-lg text-[#1670B7] font-semibold p-2">Cups & Accessories</h1>
    </div>

    <!-- Image Box 3 -->
    <div class="w-full md:w-1/3 px-4 rounded-md">
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[150px] object-cover rounded-md">
        <h1 class="text-center text-lg text-[#1670B7] font-semibold p-2">Plates, Bowls & Trays</h1>
    </div>
</div>

<div class="flex flex-col md:flex-row justify-center gap-5 p-5">
    <!-- Product Box 1 -->
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <!-- Repeat similar code for other product boxes -->
</div>
<div class="flex flex-col md:flex-row justify-center gap-5 p-5">
    <!-- Product Box 1 -->
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <!-- Repeat similar code for other product boxes -->
</div>
<div class="flex flex-col md:flex-row justify-center gap-5 p-5">
    <!-- Product Box 1 -->
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/3 h-full rounded-md border-[1px] border-[#707070]">
        <!-- Product Image -->
        <img src="{{ asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg') }}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold p-2">Sugarcane Dinner Packs</h1>
        <div class="flex flex-row">
            <!-- Product Status and Code -->
            <div class="grid">
                <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #1670b7
                            }
                        </style>
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
                </span>
                <h4 class="px-2 text-[#505050] font-semibold">Code : 19789 </h4>
            </div>
            <!-- Product Quantity -->
            <div class="m-auto">
                <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                    <!-- Decrease Button -->
                    <button data-action="decrement" class="text-gray-600 hover:text-gray-700 h-10 md:h-full w-10 md:w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <!-- Input Field -->
                    <input type="number" class="focus:outline-none text-center w-16 md:w-full font-semibold text-md md:text-base cursor-default flex items-center text-gray-700 outline-none" name="custom-input-number" value="0">
                    <!-- Increase Button -->
                    <button data-action="increment" class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-10 md:h-full w-10 md:w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- Product Buttons -->
        <div class="flex flex-col md:flex-row gap-4 py-2 p-5">
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-transparent w-full md:w-48 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 md:px-6 border-[2px] border-[#1670B7] hover:border-transparent rounded">
                    <h1 class="text-[#1670B7]">FAVORITE</h1>
                </button>
            </div>
            <div class="w-full md:w-1/2">
                <button class="mx-auto md:mx-0 bg-blue-500 w-full md:w-48 hover:bg-blue-700 text-white font-bold py-2 px-4 md:px-6 border border-blue-700 rounded">
                    ADD TO CART
                </button>
            </div>
        </div>

    </div>
    <!-- Repeat similar code for other product boxes -->
</div>



@endsection