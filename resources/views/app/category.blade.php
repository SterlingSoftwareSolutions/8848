@extends('layouts.app')
@section('content')
<div class="relative w-screen">
    <div class="bg-cover h-56 md:h-96" style="background-image: url('{{
        asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg')
    }}'); "></div>
    <div class="absolute inset-0 flex items-center justify-center bg-opacity-80 bg-black">
        <h1 class="text-2xl md:text-4xl font-bold text-white underline text-center">
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