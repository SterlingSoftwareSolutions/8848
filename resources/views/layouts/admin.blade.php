<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>



<body>
    <!-- HEADER -->
    <header>
        @include('layouts.admin.header')
    </header>

    <div class="flex">
        <!-- SIDEBAR -->
        <div class="w-[300px]">
            @include('layouts.admin.sidebar')
        </div>

        {{-- CONTENT --}}
        <div class="w-full">
            @yield('content')
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        @include('layouts.admin.footer')
    </footer>
</body>
</html