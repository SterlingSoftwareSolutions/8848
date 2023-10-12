@props([
    'product' => null
])

@extends('layouts.admin') @section('content')
<form class="p-8" method="post" @if($product) action="/admin/products/{{$product->id}}" @else action="/admin/products" @endif enctype="multipart/form-data">
    @if($product) @method('put') @endif
    @csrf
    <h1 class=" text-[#1670B7] font-bold text-lg">Add Product</h1>
    <div class="flex flex-row py-10">
        @foreach(range(1,4) as $i)
        <div class="w-1/4 max-w-md p-4 mx-auto bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-xl font-semibold">Product Image {{$i}}</h1>
            <div class="p-4 mb-4 border-2 border-gray-400 border-dashed">
                <input type="file" id="image_{{$i}}" name="image_{{$i}}" accept="image/*" class="hidden" onchange="loadPreview({{$i}})">
                <label for="image_{{$i}}" class="cursor-pointer">
                    <img @if($product) src="{{$product->image($i)}}" @endif id="preview_image_{{$i}}" class="w-[100%] aspect-square object-cover @if(!($product && $product->image($i))) hidden @endif"></img>
                    <div id="info_image_{{$i}}" class="@if($product && $product->image($i)) hidden @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mx-auto mb-4 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-center text-gray-700">Upload Photo</h5>
                        <p class="text-sm font-normal text-gray-400 md:px-6">Photo size should be less than <bclass="text-gray-600">2mb</b> and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format. <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span></p>
                    </div>
                </label>
            </div>
            <x-input-error :messages="$errors->get('image_' . $i)" class="mt-2" />
        </div>
        @endforeach
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
                <input value="{{old('title', $product->title ?? null)}}" name="title" type="text" id="title" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="John">
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category * :</label>
                <select name="category_id" type="text" id="category" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(old('category_id', $product->category_id ?? null) == $category->id) selected @endif>{{$category->parent->name ?? null}} - {{$category->name}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Short Description * :</label>
                <textarea id="message" name="short_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here...">{{old('short_description', $product->short_description ?? null)}}</textarea>
                <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
            </div>
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Descrition * :</label>
                <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here...">{{old('description', $product->description ?? null)}}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div>
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900">SKU :</label>
                <input type="text" value="{{old('sku', $product->sku ?? null)}}" name="sku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <x-input-error :messages="$errors->get('sku')" class="mt-2" />
            </div>
            <div>
                <label for="in_stock" class="block mb-2 text-sm font-medium text-gray-900">In Stock :</label>
                <input id="in_stock" @if(!$product || $product->in_stock)) checked @endif name="in_stock" class="w-5 aspect-square" type="checkbox">
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
                    @if($product && count($product->variants))
                    @foreach($product->variants as $variant)
                    <div class="flex flex-row gap-5 mb-4">
                        <div>
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Variant Name:</label>
                            <input value="{{old('variant_name_' . $variant->id, $variant->name ?? null)}}" name="variant_name_{{$variant->id}}" min="0" type="text" class="w-full px-4 py-2 border rounded-md" placeholder="Variant Name">
                            <x-input-error :messages="$errors->get('variant_name_{{$variant->id}}')" class="mt-2" />
                        </div>
                        <div>
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Price :</label>
                            <input value="{{old('variant_price_' . $variant->id, $variant->price ?? null)}}" name="variant_price_{{$variant->id}}" min="0" type="number" class="w-full px-4 py-2 border rounded-md" placeholder="$ 0.00">
                            <x-input-error :messages="$errors->get('variant_price_{{$variant->id}}')" class="mt-2" />
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="flex flex-row gap-5 mb-4">
                        <div>
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Variant Name:</label>
                            <input value="{{old('variant_name_01', $product->variant_name_01 ?? null)}}" name="variant_name_01" type="text" class="w-full px-4 py-2 border rounded-md" placeholder="Variant Name" required>
                            <x-input-error :messages="$errors->get('')" class="mt-2" />
                        </div>
                        <div>
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Price :</label>
                            <input value="{{old('variant_price_01', $product->variant_price_01 ?? null)}}" name="variant_price_01" type="number" class="w-full px-4 py-2 border rounded-md" placeholder="$ 0.00" required>
                            <x-input-error :messages="$errors->get('variant_price_01')" class="mt-2" />
                        </div>
                    </div>
                    @endif
                </div>
                <button type="button" id="add-fields" class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">Add Variant</button>
            </div>
        </div>

        <button type="submit" class="text-white bg-[#2BB673] hover:bg-[#2b7753] focus:ring-4 font-normal text-base w-full sm:w-auto px-12 py-2.5 text-center">Save</button>
        <button type="button" class="text-white bg-[#D2042D] hover:bg-[#943d4e]  text-base w-full sm:w-auto px-6 py-2.5 text-center" disabled>Cancel</button>
    </div>
</form>

<script>
    function loadPreview(index, ){
        const inputFile = document.getElementById('image_' + index);
        const previewImage = document.getElementById('preview_image_' + index);
        const infoBox = document.getElementById('info_image_' + index);
        const file = inputFile.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
                infoBox.classList.add('hidden')
            }
            reader.readAsDataURL(file);
        } else {
            previewImage.classList.add('hidden');
            infoBox.classList.remove('hidden')
        }
    }
</script>

<script>
const formContainer = document.getElementById("form-container");
const addButton = document.getElementById("add-fields");
let inputIndex = 2; // Starting index for additional input fields

addButton.addEventListener("click", () => {
    // Create a new div for the input and image upload fields
    const fieldDiv = document.createElement("div");
    fieldDiv.classList.add("mb-4", "flex", "gap-5");

    // Create a new input field 1
    const inputField1 = document.createElement("input");
    inputField1.type = "text";
    inputField1.id = `input${inputIndex}`;
    inputField1.name = `variant_name_0${inputIndex}`;
    inputField1.classList.add("w-96", "px-4", "py-2", "border", "rounded-md");
    inputField1.placeholder = "Variant Name";
    inputField1.required = true; // Make inputField1 required

    // Create a new input field 2
    const inputField2 = document.createElement("input");
    inputField2.type = "number";
    inputField2.id = `input${inputIndex}`;
    inputField2.name = `variant_price_0${inputIndex}`;
    inputField2.classList.add("w-96", "px-4", "py-2", "border", "rounded-md");
    inputField2.placeholder = "$ 0.00";
    inputField2.required = true; // Make inputField2 required

    // Create a "Remove" button
    const removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.classList.add(
        "bg-red-500",
        "text-white",
        "px-2",
        "py-1",
        "rounded-md",
        "hover:bg-red-600"
    );
    removeButton.addEventListener("click", () => {
        formContainer.removeChild(fieldDiv); // Remove the field when the "Remove" button is clicked
    });

    // Append the label, input, and image upload fields to the div
    fieldDiv.appendChild(inputField1);
    fieldDiv.appendChild(inputField2);
    fieldDiv.appendChild(removeButton);

    // Append the div to the form container
    formContainer.appendChild(fieldDiv);

    // Increment the input index
    inputIndex++;
});
</script>
@endsection