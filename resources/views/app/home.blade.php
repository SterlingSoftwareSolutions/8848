@props([
    'category' => null
])
 

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Ysabeau+Infant:wght@1;100;200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />

    <!--PLUGIN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body class="md:overflow-x-hidden">
    <!-- HEADER -->
    @include('layouts.app.header')

    <div class="relative bg-white shadow-2xl carousel">
        <div class="relative w-full overflow-hidden carousel-inner">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="absolute flex flex-col opacity-0 carousel-item h-[400px] md:h-[600px] w-full" style="background-image: url('images/home-bg.jpg'); background-size: 100% auto; background-repeat: no-repeat; display: flex; justify-content: center; align-items: center; background-position: 25%;">
                <div class="md:mr-[750px]  text-[30px] md:text-5xl text-center text-[#166eb6] font-bold">Clean, Protect, Plan</div>
                <div class="mt-5 md:mr-[630px] text-[18px] md:text-4xl text-xl text-gray-600 text-center md:text-left font-bold">Explore Our range of Cleaning &<br> Packing Solution</div>
                <button class="p-2 md:mr-[920px] mt-4 bg-gradient-to-b from-[#166EB6] to-[#284297] text-white">CLICK HERE TO VIEW OUR RANGE</button>
            </div>

            <label for="carousel-3" class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-1 md:ml-10 hover:text-white hover:bg-blue-700">‹</label>
            <label for="carousel-2" class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-1 md:mr-10 hover:text-white hover:bg-blue-700">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="absolute flex flex-col opacity-0 carousel-item h-[400px] md:h-[600px] w-full" style="background-image: url('images/home-bg.jpg'); background-size: 100% auto; background-repeat: no-repeat; display: flex; justify-content: center; align-items: center; background-position: 25%;">
                <div class="md:mr-[750px]  text-[30px] md:text-5xl text-center text-[#166eb6] font-bold">Clean, Protect, Plan</div>
                <div class="mt-5 md:mr-[630px] text-[18px] md:text-4xl text-xl text-gray-600 text-center md:text-left font-bold">Explore Our range of Cleaning &<br> Packing Solution</div>
                <button class="p-2 md:mr-[920px] mt-4 bg-gradient-to-b from-[#166EB6] to-[#284297] text-white">CLICK HERE TO VIEW OUR RANGE</button>
            </div>

            <label for="carousel-1" class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-2 md:ml-10 hover:text-white hover:bg-blue-700">‹</label>
            <label for="carousel-3" class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-2 md:mr-10 hover:text-white hover:bg-blue-700">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="absolute flex flex-col opacity-0 carousel-item h-[400px] md:h-[600px] w-full" style="background-image: url('images/home-bg.jpg'); background-size: 100% auto; background-repeat: no-repeat; display: flex; justify-content: center; align-items: center; background-position: 25%;">
                <div class="md:mr-[750px]  text-[30px] md:text-5xl text-center text-[#166eb6] font-bold">Clean, Protect, Plan</div>
                <div class="mt-5 md:mr-[630px] text-[18px] md:text-4xl text-xl text-gray-600 text-center md:text-left font-bold">Explore Our range of Cleaning &<br> Packing Solution</div>
                <button class="p-2 md:mr-[920px] mt-4 bg-gradient-to-b from-[#166EB6] to-[#284297] text-white">CLICK HERE TO VIEW OUR RANGE</button>
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
                <div class="absolute inset-0 bg-opacity-50 bg-no-repeat -ml-28" style="background-image: url('{{ asset('images/jug-image.png') }}'); opacity: 0.5;"></div>
            </div>

            <!-- Text -->
            <div class="flex flex-col items-center justify-center md:w-3/12">
                <div class="ml-5">
                    <h1 class="mb-5 text-4xl text-white">We Are 8848 Suppliers</h1>
                    <p class="mb-5 text-white">Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sed Et Leo Tincidunt, Placerat Ex In, Feugiat Urna. Integer Dictum Tellus Vitae Turpis Consequa</p>
                    <div class="flex items-center justify-center md:items-start md:justify-start">
                        <button type="button" class="text-blue-600 bg-white font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2 uppercase flex md:justify-center md:items-center hover:bg-blue-300">shop now</button>
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div class="w-full md:w-7/12">
                <div class="flex flex-col justify-center gap-5 ml-10 md:flex-row md:ml-20 md:mr-10">
                    <!-- Product Boxes (Responsive Grid) -->
                    @foreach($categories as $category)
                    <div class="w-10/12 h-full rounded-md md:w-1/2">
                        <!-- Product Image -->
                        <div class="relative group categoty-angle">
                            <!-- Original image -->
                            <div class="relative">
                                <!-- Original Image -->
                                <img src="{{ asset('images/Path 18.png') }}" alt="Original Image" class="w-full h-[280px] object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                                <!-- Overlay Image and Text -->
                                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-100">
                                    <!-- Middle Image (Initial) -->
                                    <img src="{{  $category->icon_url }}" alt="Middle Image" class="w-1/2 h-auto middle-image">

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
                                    <img src="{{ asset('images/leaf.png') }}" alt="Middle Image" class="w-1/2 h-auto middle-image2 tint-red">
                                    <div class="text-xl font-semibold category_name2">
                                        Favorite
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    @endforeach
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Section -->
    <div class="flex flex-col bg-white">
        <!-- Text -->
        <div class="text-center">
            <h1 class="my-5 text-2xl tracking-wide text-blue-500">Secure And Organize</h1>
            <h1 class="my-5 text-3xl font-bold tracking-wide text-blue-500">Explore Our Range Of Reliable And Innovative Solutions</h1>
            <p class="my-5 text-lg font-light tracking-wider text-gray-600">Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sed Et Leo Tincidunt, Placerat Ex In, Feugiat Urna. Integer Dictum Tellus Vitae Turpis Consequat,</p>
        </div>

        <!-- Icons -->
        <div class="py-4  w-6/12  mx-auto bg-[#166EB6] flex flex-col md:flex-row  justify-around md:py-10 md:px-10">
            <div class="flex flex-col items-center justify-center md:flex-row md:border-r-2 ">
                <div class="flex flex-col items-center w-1/3 ">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-20 h-20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <h1 class=" text-[20px] md:text-[30px] text-white">Quick Delivery</h1>
                    </div>
                </div>

            </div>
            <div class="flex flex-col items-center justify-center md:flex-row ">
                <div class="flex flex-col items-center w-1/3">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-20 h-20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <h1 class=" text-[20px] md:text-[30px] text-white">Secure Payment</h1>
                    </div>
                    
                </div>

            </div>
            <div class="flex flex-col items-center justify-center md:flex-row md:border-l-2">
                <div class="flex flex-col items-center w-1/3">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-20 h-20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.746 3.746 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <h1 class=" text-[20px] md:text-[30px] text-white">Best Quality</h1>
                    </div>
                </div>

            </div>
            
        </div>


    <!-- FOOTER -->
    <div class="mt-20">
        @include('layouts.app.footer')
    </div>
</body>

</html>