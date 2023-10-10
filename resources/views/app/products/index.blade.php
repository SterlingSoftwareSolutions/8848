<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- HEADER -->
    @include('layouts.app.header')

    <div class="container min-w-fit">
        {{-- Main Image --}}
        <div class="relative w-screen">
            <div class="bg-cover h-56 md:h-96" style="background-image: url('{{
        asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg')
    }}'); "></div>
            <div class="absolute inset-0 flex items-center justify-center bg-opacity-80 bg-black">
                <h1 class="text-2xl md:text-4xl font-bold text-white underline text-center">
                    Product
                </h1>
            </div>
        </div>
        <div class="flex items-center justify-center relative mx-auto ">
            <div class="flex items-center justify-between w-8/12 align-middle mt-10 md:flex-row md:mt-4">
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


        <div class="grid items-center justify-center grid-cols-1 gap-5 p-5 md:grid-cols-4 md:ml-[10%] md:mr-[10%] relative mx-auto">
            @foreach($products as $product)
            <x-product-card :product="$product" />
            @endforeach
        </div>
        <!-- FOOTER -->
        @include('layouts.app.footer')
</body>

</html