@extends('layouts.admin') @section('content')

<div class="p-8">
    <h1 class=" text-[#1670B7] font-bold text-lg pb-10">Add Category</h1>
    <form>
        <div class="flex flex-col gap-6 mb-6 md:grid-cols-2 w-full">
            <div class="flex flex-row gap-5">
                <div class="flex flex-col w-full">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parent Category * :</label>
                    <select type="text" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Sugarcane</option>
                        <option>Sugarcane1</option>
                        <option>Sugarcane2</option>
                        <option>Sugarcane4</option>
                        <option>Sugarcane3</option>
                    </select>
                </div>
                <div class="flex flex-col w-full"> <!-- Add w-full class here to make it full width -->
                    <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name * :</label>
                    <input type="text" id="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required>
                </div>
            </div>
            <div class="flex flex-row gap-5">
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Category Icon</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="file_input" type="file">
                </div>
                <div class="w-full">
                    <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Description * :</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Your message..."></textarea>
                </div>
            </div>
        </div>
        <section class="w-full pb-5 -mt-10">
            <div class="max-w-sm bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-4 py-6">
                    <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg mx-auto text-center cursor-pointer">
                        <input id="upload" type="file" class="hidden" accept="image/*" />
                        <label for="upload" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Thumbnail Image</h5>
                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <button type="submit" class="text-white bg-[#2BB673] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal text-base w-full sm:w-auto px-12 py-2.5 text-center">Save</button>
        <button type="submit" class="text-white bg-[#D2042D] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal text-base w-full sm:w-auto px-6 py-2.5 text-center ">Cancel</button>
    </form>
</div>
@endsection