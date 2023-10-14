@props([
    'category' => null
])
<a href="/products?category_id={{$category->id}}">
<div class="w-full aspect-square bg-gray-200 -skew-x-6 rounded-md bg-cover" style="background-image: url({{$category->background}});">
    <div class="bg-gray-200 w-full h-full bg-opacity-100 text-blue-800 hover:bg-black hover:bg-opacity-50 hover:text-white flex flex-col items-center justify-center">
        <img src="{{$category->icon}}" class="w-1/3 aspect-square object-contain" alt="">
        <h1 class="text-center text-lg p-2">
            {{$category->name}}
        </h1>
    </div>
</div>
</a>