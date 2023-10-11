@extends('layouts.admin') @section('content')

<form class="p-8" method="post" action="/admin/products" enctype="multipart/form-data">
    <pre>{{$errors}}</pre>
    @csrf
    <h1 class=" text-[#1670B7] font-bold text-lg">Add Product</h1>
    <div class="flex flex-row py-10">
        <div class="max-w-md p-4 mx-auto bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-xl font-semibold">Image Previewer</h1>
            <div class="p-4 mb-4 border-2 border-gray-400 border-dashed">
                <input type="file" id="upload" accept="image/*" class="hidden">
                <label for="upload" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mx-auto mb-4 text-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                    <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                    <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                </label>
            </div>
            <div id="image-preview" class="text-center">
                <!-- Preview image will be displayed here -->
            </div>
        </div>
        <div class="max-w-md p-4 mx-auto bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-xl font-semibold">Image Previewer</h1>
            <div class="p-4 mb-4 border-2 border-gray-400 border-dashed">
                <input type="file" id="upload-1" accept="image/*" class="hidden">
                <label for="upload-1" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mx-auto mb-4 text-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                    <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                    <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                </label>
            </div>
            <div id="image-preview-1" class="text-center">
                <!-- Preview image will be displayed here -->
            </div>
        </div>
        <div class="max-w-md p-4 mx-auto bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-xl font-semibold">Image Previewer</h1>
            <div class="p-4 mb-4 border-2 border-gray-400 border-dashed">
                <input type="file" id="upload-2" accept="image/*" class="hidden">
                <label for="upload-2" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mx-auto mb-4 text-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                    <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                    <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                </label>
            </div>
            <div id="image-preview-2" class="text-center">
                <!-- Preview image will be displayed here -->
            </div>
        </div>
        <div class="max-w-md p-4 mx-auto bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-xl font-semibold">Image Previewer</h1>
            <div class="p-4 mb-4 border-2 border-gray-400 border-dashed">
                <input type="file" id="upload-3" accept="image/*" class="hidden">
                <label for="upload-3" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mx-auto mb-4 text-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                    <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                    <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                </label>
            </div>
            <div id="image-preview-3" class="text-center">
                <!-- Preview image will be displayed here -->
            </div>
        </div>
        {{-- <section class="container items-center w-full mx-auto">
            <div class="items-center max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md">
                <div class="px-4 py-6">
                    <div id="image-preview2" class="items-center max-w-sm p-6 mx-auto mb-4 text-center bg-gray-100 border-2 border-gray-400 border-dashed rounded-lg cursor-pointer">
                        <input id="upload2" type="file" class="hidden" accept="image/*" />
                        <label for="upload2" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mx-auto mb-4 text-gray-700">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                            <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                            <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                            <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                            <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                        </label>
                    </div>
                </div>
            </div>
        </section> --}}
    </div>
    <div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Product Title * :</label>
                <input name="title" type="text" id="title" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="John" required>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category * :</label>
                <select name="category_id" type="text" id="category" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
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
                    <div class="flex flex-row gap-5 mb-4">
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
                <button type="button" id="add-fields" class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">Add Variant</button>
            </div>
        </div>

        <button type="submit" class="text-white bg-[#2BB673] hover:bg-[#2b7753] focus:ring-4 font-normal text-base w-full sm:w-auto px-12 py-2.5 text-center">Save</button>
        <button type="submit" class="text-white bg-[#D2042D] hover:bg-[#943d4e]  text-base w-full sm:w-auto px-6 py-2.5 text-center ">Cancel</button>
    </div>

</form>

<script>
    const uploadInput = document.getElementById('upload');
    const imagePreview = document.getElementById('image-preview');

    uploadInput.addEventListener('change', (e) => {
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview.innerHTML = `<img src="${e.target.result}" class="h-auto max-w-full">`;
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = '';
        }
    });
    
    const uploadInput1 = document.getElementById('upload-1');
    const imagePreview1 = document.getElementById('image-preview-1');

    uploadInput1.addEventListener('change', (e) => {
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview1.innerHTML = `<img src="${e.target.result}" class="h-auto max-w-full">`;
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview1.innerHTML = '';
        }
    });

    const uploadInput2 = document.getElementById('upload-2');
    const imagePreview2 = document.getElementById('image-preview-2');

    uploadInput2.addEventListener('change', (e) => {
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview2.innerHTML = `<img src="${e.target.result}" class="h-auto max-w-full">`;
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview2.innerHTML = '';
        }
    });

    const uploadInput3 = document.getElementById('upload-3');
    const imagePreview3 = document.getElementById('image-preview-3');

    uploadInput3.addEventListener('change', (e) => {
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview3.innerHTML = `<img src="${e.target.result}" class="h-auto max-w-full">`;
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview3.innerHTML = '';
        }
    });
</script>
@endsection