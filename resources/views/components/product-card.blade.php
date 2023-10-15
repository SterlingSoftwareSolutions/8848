@props([
    'product' => null
])

<form class="w-full h-full rounded-md border-[1px] border-[#707070] overflow-hidden" @if($product->variants->count() <= 1) action="/cart/add" method="post" @endif>
    @csrf
    <!-- Product Image -->
    <a href="/products/{{$product->id}}">
    <img src="{{$product->image(1)}}" alt="Image Description" class="w-full h-[280px] object-cover">
    <!-- Product Title -->
    <h1 class="text-lg text-[#505050] font-semibold p-2">{{$product->title ?? '(unknown)'}}</h1>
    </a>

    <div class="flex flex-row">
        <!-- Product Status and Code -->
        <div>
            @if($product->in_stock == true)
            <span class="text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" fill="#1670b7">
                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                </svg>                
                <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
            </span>
            @else
            <span class="text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                <b>X</b>
                <h4 class="px-2 text-red-800">OUT OF STOCK</h4>
            </span>
            @endif
            <h4 class="px-2 text-[#505050] font-semibold">Code :<br/> {{$product->sku ?? '(unknown)'}} </h4>
        </div>

        <!-- Product Quantity -->
        <div class="m-auto">
            <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
                <!-- Decrease Button -->
                <button type="button" data-action="decrement" class="w-10 h-10 text-gray-600 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400 md:h-full md:w-20">
                    <span class="m-auto text-2xl font-thin">−</span>
                </button>
                <!-- Input Field -->
                <input type="number" class="flex items-center w-16 font-semibold text-center text-gray-700 outline-none cursor-default focus:outline-none md:w-full text-md md:text-base" name="quantity" min="1" value="1">
                <!-- Increase Button -->
                <button type="button" data-action="increment" class="w-10 h-10 text-gray-600 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400 md:h-full md:w-20">
                    <span class="m-auto text-2xl font-thin">+</span>
                </button>
            </div>
        </div>

    </div>

    <!-- Product Buttons -->
    <div class="flex items-center justify-center p-2 mt-3 ml-2 flex-col-2">
        <button type="submit" class="w-2/4 p-2 text-blue-500 border-2 border-blue-600 rounded-sm hover:bg-blue-300">
            Favorite
        </button>
        @if($product->in_stock)
            @if($product->variants->count() == 1)
            <input type="hidden" name="variant_id" value="{{$product->variants[0]->id}}">
            <button type="submit" class="w-3/4 p-2 ml-4 bg-gradient-to-b from-[#166EB6] to-[#284297] rounded-sm text-white hover:text-blue-500">
                ADD TO CART
            </button>
            @else
            <a href="/products/{{$product->id}}" class="w-3/4 p-2 ml-4 bg-gradient-to-b from-[#166EB6] to-[#284297] rounded-sm text-center text-white hover:text-blue-500">
                VIEW OPTIONS
            </a>
            @endif
        @else
            <button type="button" class="w-3/4 p-2 ml-4 bg-gradient-to-b from-[#B6B6B6] to-[#979797] rounded-sm text-white hover:text-white-500" disabled>
                OUT OF STOCK
            </button>
        @endif
    </div>

</form>
