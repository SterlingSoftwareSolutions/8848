<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- HEADER -->
    @include('layouts.app.header')

    <div class="container mx-auto">
        @yield('content')
    </div>

    <!-- FOOTER -->
    @include('layouts.app.footer')
</body>
</html