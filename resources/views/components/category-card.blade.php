@props([
    'category' => null
])
<a href="/categories/{{$category->id}}">
<div class="w-full -skew-x-6 bg-gray-200 bg-cover rounded-md aspect-square" style="background-image: url({{$category->background}});">
    <div class="rounded-md bg-blue-900 w-full h-full bg-opacity-5 text-white hover:text-opacity-100 [&:not(:hover)>h1]:truncate [&:not(:hover)>h1]:backdrop-blur-sm [&>h1]:hover:bg-opacity-0 hover:bg-opacity-30 hover:backdrop-blur-sm flex flex-col items-center justify-end hover:justify-center overflow-hidden">
        <h1 class="w-full p-2 text-base text-center bg-blue-900 bg-opacity-40">
            {{$category->name}}
        </h1>
    </div>
</div>
</a>