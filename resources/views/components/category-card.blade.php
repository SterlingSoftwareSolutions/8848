@props([
    'category' => null
])
 
 <!-- Product Box 1 -->
 <div class="w-full h-full rounded-md md:w-1/4">
    <!-- Product Image -->
    <div class="relative group categoty-angle">
        <!-- Original image -->
        <div class="relative">
            <!-- Original Image -->
            <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

            <!-- Overlay Image and Text -->
            <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                <!-- Middle Image (Initial) -->
                <img src="{{ $category->icon_url }}" alt="Middle Image" class="w-1/2 h-auto middle-image">

                <!-- Text (You can customize this) -->
                <div class="category_name1 text-[#166eb6] font-semibold text-xl">
                    {{$category->name}}
                </div>
            </div>
        </div>

        <!-- Hover image (Initial) -->
        <div class="hover-image">
            <img src="{{ $category->background_image_url }}" alt="Hover Image" class=" hover_img w-full h-[280px] object-cover absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">

            <!-- Icon and text -->
            <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                <!-- Middle Image (Hover) -->
                <img src="{{ asset('images/logo.png') }}" alt="Middle Image" class="w-1/2 h-auto middle-image2">
                <div class="text-xl font-semibold category_name2">
                    Favorite
                </div>
            </div>
        </div>
    </div>

</div>