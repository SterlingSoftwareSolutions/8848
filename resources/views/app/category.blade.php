@props([
    'parent' => null
])

@extends('layouts.app', ['title' => $parent?->name ?? "Categories", 'fullwidth' => true])
@section('content')
{{-- Main Image --}}
<div class="relative w-screen">
    <div class="h-56 bg-cover md:h-[70vh] bg-fixed"
        style="background-image: url('{{ $parent->background ?? asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}'); ">
    </div>
    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40">
        <h1 class="text-2xl font-bold text-center text-white md:text-5xl drop-shadow-2xl">
            {{$parent ? $parent->name : 'Products'}}
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