@props([
'category' => null,
'parent_categories' => null
])

@extends('layouts.admin') @section('content')

<div class="p-8">
    <h1 class=" text-[#1670B7] font-bold text-lg pb-10">@if($category) Edit Category @else Add Category @endif</h1>
    <form method="post" @if($category) action="/admin/categories/{{$category->id}}" @else  action="/admin/categories" @endif enctype="multipart/form-data">
        @if($category) @method('put')@endif
        @csrf

        <div class="flex flex-col gap-6 mb-6 md:grid-cols-2 w-full">
            <div class="flex flex-row gap-5">
                <div class="flex flex-col w-full">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Parent Category:</label>
                    <select name="parent_id" type="text" id="category" class="bg-gray-50 border disabled:bg-gray-300 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" @if($category && $category->parent_id == null) disabled @elseif($category) required @endif>
                        <option value="">Add as Parent Category</option>
                        @foreach($parent_categories as $parent_category)
                        @if($parent_category->id != ($category->id ?? null))
                        <option value="{{$parent_category->id}}" @if(($category->parent_id ?? null) == $parent_category->id) selected @elseif(Request::get('parent') == $parent_category->id) selected @endif>{{$parent_category->name}}</option>
                        @endif
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
                </div>
                <div class="flex flex-col w-full"> <!-- Add w-full class here to make it full width -->
                    <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 ">Category Name:</label>
                    <input type="text" name="name" value="{{old('name', $category->name ?? null)}}" id="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>
            <div class="flex flex-row gap-5">
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">@if($category->background_url ?? null) Change @endif Category Image</label>
                    <input name="background_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" type="file">
                    <x-input-error :messages="$errors->get('background_image')" class="mt-2" />
                </div>
                <div class="w-full">
                    <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 ">Category Description:</label>
                    <textarea name="description" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Your message...">{{old('description', $category->description ?? null)}}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            </div>
        </div>
        <button type="submit" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none font-normal text-base w-full sm:w-auto px-12 py-2.5 text-center">Save</button>
        <a href="/admin/categories"><button type="button" class="text-white bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none font-normal text-base w-full sm:w-auto px-6 py-2.5 text-center ">Cancel</button></a>
    </form>
</div>
@endsection