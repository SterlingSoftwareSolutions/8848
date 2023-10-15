@extends('layouts.app', ['title' => 'Categories', 'fullwidth' => true])
@section('content')
{{-- Main Image --}}
<div class="h-56 md:h-96 bg-cover bg-center bg-fixed" style="background-image: url('{{asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg')}}');">
    <div class="bg-black bg-opacity-75 h-[100%] flex justify-center items-center">
        <h1 class="text-2xl font-bold text-center text-white md:text-4xl">
            Categories
        </h1>
    </div>
</div>
<div class="max-w-screen-xl mx-auto p-8">
    <div class="relative grid grid-cols-3 gap-5 md:grid-cols-6 ">
        @foreach($categories as $category)
        <x-category-card :category="$category" />
        @endforeach
    </div>
</div>
@endsection