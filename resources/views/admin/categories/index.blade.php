@props([
    'categories' => null,
    'parent' => null
])

@extends('layouts.admin')
@section('content')

<div class="md:mb-5">

    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        @if($parent)
        <div class="flex justify-between items-center w-full md:mt-5">
            <a href="/admin/categories/create?parent={{$parent->id}}"><h1 class="text-center text-white bg-blue-900 rounded-lg px-4 py-3 h-12 w-40">Add Subcategory </h1></a>
            <h1 class="text-blue-900 text-xl">{{$parent->name}}</h1>
            <a href="/admin/categories/{{$parent->id}}/edit"><h1 class="text-center text-white bg-gray-900 rounded-lg px-4 py-3 h-12 w-40">Edit Category</h1></a>
        </div>
        @else
        <div class="flex justify-between w-full md:mt-5">
            <a href="/admin/categories/create"><h1 class="text-center text-white bg-blue-900 rounded-lg px-4 py-3 h-12 w-40">Add Category </h1></a>
        </div>
        @endif
    </div>

    <div class="flex flex-col mx-2 border-2 md:mt-5 md:mx-10 ">
        <!-- Box 1: Customer List -->
        <div class="text-blue-900 ">
            <div class="flex flex-row py-5 bg-gray-200">
                <p class="w-1/6 p-2"></p>
                <p class="w-1/6 p-2">Name</p>
                <p class="w-1/6 p-2">Parent</p>
                <p class="w-1/6 p-2">Sub Categories</p>
                <p class="w-1/6 p-2">Items</p>
                <p class="w-1/6 p-2">Action</p>
            </div>
            <!-- Placeholder Content for Box 1 -->
            @foreach($categories as $category)
                <x-category-row :category="$category"/>
            @endforeach
        </div>

    </div>
</div>
</div>
@endsection