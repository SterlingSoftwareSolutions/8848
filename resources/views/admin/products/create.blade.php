@extends('layouts.admin') @section('content')

<div class="p-8">
    <h1 class=" text-[#1670B7] font-bold text-lg">Add Product</h1>
    <div class="flex flex-row py-10">
        <section class="container w-full mx-auto items-center">
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                <div class="px-4 py-6">
                    <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                        <input id="upload" type="file" class="hidden" accept="image/*" />
                        <label for="upload" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <section class="container w-full mx-auto items-center">
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                <div class="px-4 py-6">
                    <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                        <input id="upload2" type="file" class="hidden" accept="image/*" />
                        <label for="upload2" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <section class="container w-full mx-auto items-center ">
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                <div class="px-4 py-6">
                    <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                        <input id="upload3" type="file" class="hidden" accept="image/*" />
                        <label for="upload3" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <section class="container w-full mx-auto items-center">
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                <div class="px-4 py-6">
                    <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                        <input id="upload4" type="file" class="hidden" accept="image/*" />
                        <label for="upload4" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <form>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name * :</label>
                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category * :</label>
                <select type="text" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Sugarcane</option>
                    <option>Sugarcane</option>
                    <option>Sugarcane</option>
                    <option>Sugarcane</option>
                    <option>Sugarcane</option>
                </select>
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price * :</label>
                <input type="number" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="$ 0.00" required>
            </div>
            <div>
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Adjustment :</label>
                <div>
                    <div class="flex items-center mb-4">
                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Stok Available</label>
                    </div>
                    <div class="flex items-center">
                        <input checked id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Stok Not Available</label>
                    </div>
                </div>
            </div>
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short Description * :</label>
                <textarea id="message" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            </div>
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrition * :</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            </div>
            <div>
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Catelog :</label>
                <input id="file_input" type="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
        </div>
        <h1 class=" text-[#1670B7] font-bold text-lg">Add Variation</h1>
        <div class="flex flex-row py-10">
            <div class="max-w-md">
                <div id="form-container">
                    <!-- Initial input field -->
                    <div class="mb-4 flex flex-row gap-5">
                        <div>
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Variyan Name:</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-md" placeholder="Variant Name">
                        </div>
                        <div>
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price :</label>
                            <input type="number" class="w-full px-4 py-2 border rounded-md" placeholder="$ 0.00">
                        </div>
                    </div>
                </div>
                <button id="add-fields" class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-600">Add Variant</button>
            </div>
        </div>

        <button type="submit" class="text-white bg-[#2BB673] hover:bg-[#2b7753] focus:ring-4 font-normal text-base w-full sm:w-auto px-12 py-2.5 text-center">Save</button>
        <button type="submit" class="text-white bg-[#D2042D] hover:bg-[#943d4e]  text-base w-full sm:w-auto px-6 py-2.5 text-center ">Cancel</button>
    </form>

</div>
@endsection