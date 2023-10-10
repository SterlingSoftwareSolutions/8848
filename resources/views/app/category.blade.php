@extends('layouts.app')
@section('content')
<div class="relative w-screen">
    <div class="bg-cover h-72 md:h-96" style="background-image: url('{{
                asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg')
            }}'); "></div>
    <div class="absolute inset-0 flex items-center justify-center">
        <h1 class="text-3xl font-bold text-white underline md:text-4xl">
            Category
        </h1>
    </div>
</div>


<div class="flex flex-col justify-center gap-5 p-5 ml-0 md:flex-row md:ml-20">
    @foreach($categories as $category)
    <x-category-card :category="$category" />
    @endforeach

</div>

@endsection