@props([
    'title' => 'Untitled'
])

<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{env('APP_NAME')}} - {{$title}}</title>
</head>

<body>
    <!-- HEADER -->
    @include('layouts.app.header')

    <div class="max-w-screen-xl mx-auto p-8">
        @yield('content')
    </div>

    <!-- FOOTER -->
    @include('layouts.app.footer')
</body>
</html