@props([
    'title' => '',
    'parent' => null,
    'fullwidth' => false
])

<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{env('APP_NAME')}} {{$title ? '- ' . $title : ''}}</title>
</head>

<body>
    <!-- HEADER -->
    @include('layouts.app.header')
    <div class="@if(!$fullwidth) max-w-screen-xl mx-auto p-8 @endif">
        @if($title && !$fullwidth)
            <!-- Breadcrumbs -->
            <div class="flex gap-1 font-bold text-blue-800 flex-row text-2xl mb-4">
                <a href="/">Home</a>
                <span>/</span>
                @if($parent)
                <a href="{{$parent['url']}}">{{$parent['name']}}</a>
                <span>/</span>
                @endif
                <span>{{$title}}</span>
            </div>
        @endif
             <x-errors :margin="!$fullwidth"/>
        @yield('content')
    </div>

    <!-- FOOTER -->
    @include('layouts.app.footer')
</body>
</html
