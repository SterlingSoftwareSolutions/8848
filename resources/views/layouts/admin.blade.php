<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- HEADER -->
    @include('layouts.admin.header')

    <!-- SIDEBAR -->
    @include('layouts.admin.sidebar')

    <div>
        @yield('content')
    </div>

    <!-- FOOTER -->
    @include('layouts.admin.footer')
</body>
</html