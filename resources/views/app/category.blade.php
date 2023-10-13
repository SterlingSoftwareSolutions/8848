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

    <div class="container">
        {{-- Main Image --}}
        <div class="relative w-screen">
            <div class="h-56 bg-cover md:h-96" style="background-image: url('{{
        asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg')
        }}'); "></div>
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-80">
                <h1 class="text-2xl font-bold text-center text-white underline md:text-4xl">
                    Category
                </h1>
            </div>
        </div>

        <div class="flex flex-col justify-center gap-5 p-5 ml-0 md:flex-row md:ml-20">
            @foreach($categories as $category)
            <x-category-card :category="$category" />
            @endforeach
        </div>

        {{-- End Product Details  --}}
    </div>

    <!-- FOOTER -->
    @include('layouts.app.footer')
</body>

</html