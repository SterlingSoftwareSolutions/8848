@extends('layouts.admin') @section('content')

<form class="p-8" method="post" action="/admin/products" enctype="multipart/form-data">
    <pre>{{$errors}}</pre>
    @csrf
    <h1 class=" text-[#1670B7] font-bold text-lg">Add Product</h1>
    <div class="flex flex-row py-10">
        <section class="container w-full mx-auto items-center">
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                <div class="px-4 py-6">
                    <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                        <input id="image_1" type="file" accept="image/*" name="image_1" />
                        <label for="image_1" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('image_1')" class="mt-2" />
                </div>
            </div>
        </section>
        <section class="container w-full mx-auto items-center">
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                <div class="px-4 py-6">
                    <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                        <input id="image_2" type="file" accept="image/*" name="image_2" />
                        <label for="image_2" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('image_2')" class="mt-2" />
                </div>
            </div>
        </section>
        <section class="container w-full mx-auto items-center">
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                <div class="px-4 py-6">
                    <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                        <input id="image_3" type="file" accept="image/*" name="image_3" />
                        <label for="image_3" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('image_3')" class="mt-2" />
                </div>
            </div>
        </section>
        <section class="container w-full mx-auto items-center">
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                <div class="px-4 py-6">
                    <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                        <input id="image_4" type="file" accept="image/*" name="image_4" />
                        <label for="image_4" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('image_4')" class="mt-2" />
                </div>
            </div>
        </section>
    </div>
    <div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Product Title * :</label>
                <input name="title" type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="John" required>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category * :</label>
                <select name="category_id" type="text" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Short Description * :</label>
                <textarea id="message" name="short_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
            </div>
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Descrition * :</label>
                <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div>
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900">SKU :</label>
                <input type="text" name="sku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <x-input-error :messages="$errors->get('sku')" class="mt-2" />
            </div>
            <div>
                <label for="in_stock" class="block mb-2 text-sm font-medium text-gray-900">In Stock :</label>
                <input id="in_stock" name="in_stock" class="w-5 aspect-square" type="checkbox" checked>
                <x-input-error :messages="$errors->get('in_stock')" class="mt-2" />
            </div>
            <div>
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Upload Catelog :</label>
                <input id="file_input" type="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <x-input-error :messages="$errors->get('file_input')" class="mt-2" />
            </div>
        </div>
        <h1 class=" text-[#1670B7] font-bold text-lg">Add Variation</h1>
        <div class="flex flex-row py-10">
            <div class="max-w-md">
                <div id="form-container">
                    <!-- Initial input field -->
                    <div class="mb-4 flex flex-row gap-5">
                        <div>
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Variant Name:</label>
                            <input name="variant_name_01" type="text" class="w-full px-4 py-2 border rounded-md" placeholder="Variant Name">
                            <x-input-error :messages="$errors->get('variant_name_01')" class="mt-2" />
                        </div>
                        <div>
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Price :</label>
                            <input name="variant_price_01" type="number" class="w-full px-4 py-2 border rounded-md" placeholder="$ 0.00">
                            <x-input-error :messages="$errors->get('variant_price_01')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <button type="button" id="add-fields" class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-600">Add Variant</button>
            </div>
        </div>

        <button type="submit" class="text-white bg-[#2BB673] hover:bg-[#2b7753] focus:ring-4 font-normal text-base w-full sm:w-auto px-12 py-2.5 text-center">Save</button>
        <button type="submit" class="text-white bg-[#D2042D] hover:bg-[#943d4e]  text-base w-full sm:w-auto px-6 py-2.5 text-center ">Cancel</button>
    </div>

</form>
@endsection