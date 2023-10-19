@props([
'product' => null
])

@extends('layouts.admin') @section('content')
<form class="p-8" method="post" @if($product) action="/admin/products/{{$product->id}}" @else action="/admin/products"
    @endif enctype="multipart/form-data">
    @if($product) @method('put') @endif
    @csrf
    <h1 class=" text-[#1670B7] font-bold text-lg">Add Product</h1>
    <div class="flex flex-row py-10"> @foreach(range(1,4) as $i) <div
        class="w-1/4 max-w-md p-4 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-xl font-semibold">Product Image {{$i}}</h1>
        <div class="p-4 mb-4 border-2 border-gray-400 border-dashed">
        <input type="file" id="image_{{$i}}" name="image_{{$i}}" accept="image/*" class="hidden"
            onchange="loadPreview({{$i}})">
        <label for="image_{{$i}}" class="cursor-pointer">
        <img @if($product) src="{{$product->image($i)}}" @endif id="preview_image_{{$i}}" class="w-[100%] aspect-square
        object-cover @if(!($product && $product->image($i))) hidden @endif"></img>
        <div id="info_image_{{$i}}" class="@if($product && $product->image($i)) hidden @endif">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-8 h-8 mx-auto mb-4 text-gray-700">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0
            0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
            </svg>
            <h5 class="mb-2 text-xl font-bold tracking-tight text-center text-gray-700">Upload Photo</h5>
            <p class="text-sm font-normal text-gray-400 md:px-6">Photo size should be less than
            <bclass="text-gray-600">2mb</b> and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format. <span
            id="filename" class="z-50 text-gray-500 bg-gray-200"></span></p>
        </div>
        </label>
        </div>
        <x-input-error :messages="$errors->get('image_' . $i)" class="mt-2" />
        </div>
        @endforeach
        {{-- <section class="container items-center w-full mx-auto">
            <div class="items-center max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md">
            <div class="px-4 py-6">
            <div id="image-preview2"
                class="items-center max-w-sm p-6 mx-auto mb-4 text-center bg-gray-100 border-2 border-gray-400 border-dashed rounded-lg cursor-pointer">
                <input id="upload2" type="file" class="hidden" accept="image/*" />
                <label for="upload2" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 mx-auto mb-4 text-gray-700">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25
                    2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b
                    class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG,
                    PNG, or GIF</b> format.</p>
                    <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b
                    class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG,
                    PNG, or GIF</b> format.</p>
                    <span id="filename" class="z-50 text-gray-500 bg-gray-200"></span>
                    </label>
                    </div>
            </div>
            </div>
            </section> --}}
    </div>
    <div> <div class="w-full" style="width: 100%"> <label for="title"
        class="block mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">Product
        Title :</label>
        <input value="{{old('title', $product->title ?? null)}}" name="title" type="text" id="title" class="block w-full
        p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500
        focus:border-blue-500" placeholder="John" style="width: 100%">
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div><br>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
        <label for="category"
            class="block mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">Category
            :</label>
        <select name="category_id" type="text" id="category" onchange="updateSubCat()" class="block w-full p-2 text-sm
        text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
        {{-- CATEGORIES GO HERE --}}
        </select>
        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>
        <div>
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Sub Category * :</label>
            <select name="sub_category_id" type="text" id="subcategory" class="block w-full p-2 text-sm text-gray-900
            border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
            {{-- SUB CATEGORIES GO HERE --}}
            </select>
            <x-input-error :messages="$errors->get('sub_category_id')" class="mt-2" />
        </div>
        <div>
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Short Description * :</label>
        <textarea id="message" name="short_description" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Write your thoughts here...">{{old('short_description', $product->short_description ?? null)}}</textarea>
        <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
        </div>
        <div>
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Features * :</label>
            <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900
            bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write
            your thoughts here...">{{old('description', $product->description ?? null)}}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div>
            <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Upload Catelog :</label>
            <input id="file_input" name="pdf_file" type="file" class="bg-gray-50 border border-gray-300 text-gray-900
            text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <x-input-error :messages="$errors->get('pdf_file')" class="mt-2" />
        </div>
        <div>
        <label for="in_stock" class="block mb-2 text-sm font-medium text-gray-900">In Stock :</label>
        <input id="in_stock" @if(!$product || $product->in_stock)) checked @endif name="in_stock" class="w-5
        aspect-square" type="checkbox">
        <x-input-error :messages="$errors->get('in_stock')" class="mt-2" />
        </div>
        </div>
        <h1 class=" text-[#1670B7] font-bold text-lg">Add Variation</h1>
        <div class="py-10">
        <div class="">
            <div id="form-container">
            <!-- Initial input field -->
            @if($product && count($product->variants))
            @foreach($product->variants as $variant)
            <div class="flex gap-5" id="variant_container_{{$variant->id}}">
            <div class="flex gap-5 mb-4">
                <div>
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Variant Name:</label>
                <input value="{{old('variant_name_' . $variant->id, $variant->name ?? null)}}"
                    name="variant_name_{{$variant->id}}" type="text" class="w-full px-4 py-2 border rounded-md"
                    placeholder="Variant Name">
                <x-input-error :messages="$errors->get('variant_name_{{$variant->id}}')" class="mt-2" />
                </div>
                <div>
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Price :</label>
                    <input value="{{old('variant_price_' . $variant->id, $variant->price ?? null)}}"
                    name="variant_price_{{$variant->id}}" min="0" step=".01" type="number" class="w-full px-4 py-2
                    border rounded-md" placeholder="$0.00">
                    <x-input-error :messages="$errors->get('variant_price_{{$variant->id}}')" class="mt-2" />
                    </div>
                    <div>
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900">SKU :</label>
                    <input value="{{old('variant_sku_' . $variant->id, $variant->sku ?? null)}}"
                    name="variant_sku_{{$variant->id}}" min="0" type="text" class="w-full px-4 py-2 border rounded-md"
                    placeholder="SKU">
                    <x-input-error :messages="$errors->get('variant_sku_' . $variant->id)" class="mt-2" />
                </div>
                </div>
                <button class="px-2 py-1 mt-8 text-white bg-red-500 rounded-md h-7 hover:bg-red-600" type="button"
                onclick="remove_id('variant_container_{{$variant->id}}')">Remove</button>
            </div>
            @endforeach
            @else
            <div class="flex flex-row gap-5 mb-4 variant-container" id="variant_container_01">
                <div>
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Variant Name:</label>
                    <input value="{{ old('variant_name_01', 'Default') }}" name="variant_name_01" type="text"
                        class="w-full px-4 py-2 border rounded-md" placeholder="Variant Name" required>
                    <x-input-error :messages="$errors->get('variant_name_01')" class="mt-2" />
                </div>
                <div>
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Price:</label>
                    <input value="{{ old('variant_price_01') }}" name="variant_price_01" type="number" step=".01"
                        class="w-full px-4 py-2 border rounded-md" placeholder="$0.00" required>
                    <x-input-error :messages="$errors->get('variant_price_01')" class="mt-2" />
                </div>
                <div>
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900">SKU :</label>
                    <input type="text" value="{{old('variant_sku_01', '')}}" name="variant_sku_01"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="SKU">
                    <x-input-error :messages="$errors->get('variant_sku_01')" class="mt-2" />
                </div>
                <button class="h-10 px-2 mt-8 text-white bg-red-500 rounded-md hover:bg-red-600"
                    onclick="remove_id('variant_container_01')" type="button">Remove</button>
            </div>
            @endif
        </div>
        <button type="button" id="add-fields" class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">Add
            Variant</button>
        </div>
        </div>

        <button type="submit"
            class="text-white bg-[#2BB673] hover:bg-[#2b7753] focus:ring-4 font-normal text-base w-full sm:w-auto px-12 py-2.5 text-center">Save</button>
        <a href="/admin/products"><button type="button"
                class="text-white bg-[#D2042D] hover:bg-[#943d4e]  text-base w-full sm:w-auto px-6 py-2.5 text-center">Cancel</button></a>
        </div>
</form>


{{-- Category Selection --}}
<script>
    var categories = @json($categories);
    var categoryElement = document.getElementById("category");
    var subCategoryElement = document.getElementById("subcategory");

    @if ($product)
        var selectedCat = {{ $product->category?->parent_id ?? $product->category?->id ?? 0}}
    var selectedSubCat = {{ $product->category?->parent_id ? $product->category?->id : 0}}
    @else
    var selectedCat = 0;
    var selectedSubCat = 0;
    @endif

    // Iterate through the categories array and create option elements for parent categories
    for (var i = 0; i < categories.length; i++) {
        var category = categories[i];
        if (category.parent_id === null) {
            var option = document.createElement("option");
            option.value = category.id;
            option.text = category.name;
            option.selected = category.id === selectedCat;
            categoryElement.appendChild(option);
        }
    }

    // Iterate through the categories array and create option elements for subcategories of current parent
    function updateSubCat() {
        subCategoryElement.innerHTML = '';
        var default_option = document.createElement("option");
        default_option.value = ''
        default_option.text = 'None'
        subCategoryElement.appendChild(default_option);
        selectedCat = categoryElement.options[categoryElement.selectedIndex].value;
        console.log(selectedCat);
        if (selectedCat) {
            // Iterate through the categories array and create option elements
            for (var i = 0; i < categories.length; i++) {
                var category = categories[i];
                if (category.parent_id == selectedCat) {
                    var option = document.createElement("option");
                    option.value = category.id;
                    option.text = category.name;
                    option.selected = (category.id === selectedSubCat);
                    subCategoryElement.appendChild(option);
                }
            }
            if (subCategoryElement.innerHTML == '') {
                subCategoryElement.setAttribute('disabled', true);
            } else {
                subCategoryElement.removeAttribute('disabled')
            }
        } else {
            subCategoryElement.setAttribute('disabled', true);
        }
    }

    updateSubCat();

</script>

<script>
    function loadPreview(index,) {
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
    const isEditMode = true;

    addButton.addEventListener("click", () => {
        // Create a new div for the input and image upload fields
        const fieldDiv = document.createElement("div");
        fieldDiv.classList.add("mb-4", "flex", "gap-5", "max-w-md", 'variant-container');
        fieldDiv.id = `variant_container_0${inputIndex}`;

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
        inputField2.placeholder = "$0.00";
        inputField2.min = 0;
        inputField2.step = ".01"
        inputField2.required = true; // Make inputField2 required

        // Create a new input field 2
        const sku = document.createElement("input");
        sku.type = "text";
        sku.id = `input${inputIndex}`;
        sku.name = `variant_sku_0${inputIndex}`;
        sku.classList.add("w-96", "px-4", "py-2", "border", "rounded-md");
        sku.placeholder = "SKU";
        sku.required = true; // Make inputField2 required

        // Create a "Remove" button
        const removeButton = document.createElement("button");
        removeButton.textContent = "Remove";
        removeButton.type = 'button';
        removeButton.classList.add(
            "bg-red-500",
            "text-white",
            "px-2",
            "py-1",
            "rounded-md",
            "hover:bg-red-600"
        );
        removeButton.setAttribute('onclick', "remove_id('variant_container_0" + inputIndex + "')");

        // Append the label, input, and image upload fields to the div
        fieldDiv.appendChild(inputField1);
        fieldDiv.appendChild(inputField2);
        fieldDiv.appendChild(sku);
        fieldDiv.appendChild(removeButton);

        // Append the div to the form container
        formContainer.appendChild(fieldDiv);

        // Increment the input index
        inputIndex++;
    });
</script>
<script>
    function remove_id(container) {
        document.getElementById(container).remove();
    }
</script>
@endsection