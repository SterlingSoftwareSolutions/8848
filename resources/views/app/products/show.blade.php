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

        {{-- Sub Image & Description --}}
        <div class="w-11/12 mx-auto mt-5 md:w-9/12">
            <div class="flex flex-col gap-1 text-sm font-bold text-blue-800 md:flex-row md:text-2xl">
                <a href="">Home</a>
                <span>/</span>
                <a href="">Areca Palm Leaves</a>
                <span>/</span>
                <span class="">8848 Test Product 2</span>
            </div>

            <div class="flex flex-col mt-5 md:flex-row">
                <div class="relative w-full md:w-6/12">
                    <img src="{{
                            asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg')
                        }}" alt="Image Description" class="w-full" />

                    <!-- White circle with search icon -->
                    <div class="absolute flex items-center justify-center w-12 h-12 bg-white rounded-full cursor-pointer top-5 right-5" onclick="openImage()">
                        <i class="fa fa-search" style="color: rgb(167, 36, 36)" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="w-full mt-5 md:w-6/12 md:mt-10 md:pl-5">
                    <p class="text-lg font-bold text-gray-400">CODE:test-p-2</p>
                    <p class="mt-1 text-3xl font-bold text-blue-800">
                        8848 Test Product 02
                    </p>
                    <p class="mt-2 text-gray-700">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Enim suscipit ipsum quia aliquam explicabo ipsa amet?
                    </p>
                    <p class="mt-5 text-3xl font-bold text-blue-800">$30.00</p>

                    <p class="text-lg text-red-500 md:mt-5">Out of stock</p>

                    <div class="horizontal-line md:mt-5"></div>

                    <p class="mt-5 text-lg font-bold text-gray-500">
                        Categories: Areca Palm Leaves
                    </p>
                </div>
            </div>
        </div>
        {{-- End Sub Image & Description --}}

        {{-- Product Details  --}}

        <div class="w-11/12 mx-auto mt-5 md:w-9/12">
            <div class="flex flex-row justify-center w-full gap-5">
                <div class="horizontal-line-2"></div>
                <p class="font-bold text-center text-blue-800 md:mt-5">
                    Product Details
                </p>
                <div class="horizontal-line-2"></div>
            </div>

            <p class="text-center md:mb-20">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Voluptatibus assumenda eveniet explicabo provident atque commodi
                asperiores. Modi ullam rerum aspernatur, dolore deleniti minus
                veniam, eaque consequatur dicta quo veritatis ducimus temporibus
                deserunt.
            </p>
        </div>

        {{-- End Product Details  --}}
    </div>

    <!-- FOOTER -->
    @include('layouts.app.footer')
</body>

</html