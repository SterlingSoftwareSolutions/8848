@extends('layouts.app')
@section('content')


<div class="flex flex-col justify-center gap-5 p-5 md:flex-row ml-0 md:ml-20">
    <!-- Product Box 1 -->
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Repeat similar code for other product boxes -->
</div>
<div class="flex flex-col justify-center gap-5 p-5 md:flex-row ml-0 md:ml-5 md:mr-12">
    <!-- Product Box 1 -->
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Repeat similar code for other product boxes -->
</div>
<div class="flex flex-col justify-center gap-5 p-5 md:flex-row ml-0 md:-ml-8 md:mr-24">
    <!-- Product Box 1 -->
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/4 h-full rounded-md">
        <!-- Product Image -->
        <div class="group relative categoty-angle">
            <!-- Original image -->
            <div class="relative">
                <!-- Original Image -->
                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                <!-- Overlay Image and Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Initial) -->
                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="middle-image w-1/2 h-auto">

                    <!-- Text (You can customize this) -->
                    <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>

            <!-- Hover image (Initial) -->
            <div class="hover-image">
                <img src="{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

                <!-- Icon and text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                    <!-- Middle Image (Hover) -->
                    <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="middle-image2 w-1/2 h-auto">
                    <div class="category_name2 font-semibold text-xl">
                        Favorite
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Repeat similar code for other product boxes -->
</div>

@endsection