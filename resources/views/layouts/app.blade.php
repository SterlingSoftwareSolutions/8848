@props([
    'title' => ''
])

<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{env('APP_NAME')}} {{$title ? '- ' . $title : ''}}</title>
</head>

<body>
    <!-- HEADER -->
    @include('layouts.app.header')

    <div class="max-w-screen-xl mx-auto p-8">
        @if($title)
            <!-- Navigation Bar -->
            <div class="flex gap-1 font-bold text-blue-800 flex-row text-2xl mb-4">
                <a href="/">Home</a>
                <span>/</span>
                <span>{{$title}}</span>
            </div>
        @endif
        @yield('content')
    </div>

    <!-- FOOTER -->
    @include('layouts.app.footer')
</body>
</html