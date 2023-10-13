@extends('layouts.admin') @section('content')

<div class="md:mb-5">

    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">

        <div class="flex justify-between w-full md:mt-5">

            <a href="/admin/categories/create"><h1 class="text-center text-white bg-blue-900 rounded-lg px-4 py-3 h-12 w-40">Add Category </h1></a>
        </div>
    </div>


    <div class="flex flex-col mx-2 border-2 md:mt-5 md:mx-10 ">
        <!-- Box 1: Customer List -->
        <div class="text-blue-900 ">
            <div class="flex flex-row py-5 bg-gray-200">
                <p class="w-1/5"></p>
                <p class="w-1/5">Name</p>
                <p class="w-1/5">Sub Categories</p>
                <p class="w-1/5">Items</p>
                <p class="w-1/5">Action</p>
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