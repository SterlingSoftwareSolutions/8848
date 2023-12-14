@props([
    'product' => null
])

<form class="flex flex-col gap-2 w-full h-full rounded-md p-4 border-[1px] border-[#707070] overflow-hidden" action="/cart/add" method="post">
    @csrf
    <!-- Product Image -->
    <a href="/products/{{$product->id}}">
        <img src="{{$product->image(1)}}" alt="Image Description" class="w-full h-[280px] object-cover">
        <!-- Product Title -->
        <h1 class="text-lg text-[#505050] font-semibold truncate" title="{{$product->title ?? '(unknown)'}}">{{$product->title ?? '(unknown)'}}</h1>
    </a>

    <div class="flex flex-row gap-2 justify-between items-center">
        <!-- Product Status and Code -->
        <div class="w-1/2">
            @if($product->in_stock == true)
            <span class="text-blue-800 text-xs font-medium inline-flex items-center rounded">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" fill="#1670b7">
                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                </svg>
                <h4 class="px-2 text-[#1670B7]">IN STOCK</h4>
            </span>
            @else
            <span class="text-red-800 text-xs font-medium inline-flex items-center rounded">
                <b>X</b>
                <h4 class="px-2 text-red-800">OUT OF STOCK</h4>
            </span>
            @endif
        </div>
 
        <!-- Product Quantity -->
        <div class="w-1/2 ps-1">
            <div class="flex flex-row md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
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

    <!-- Product Variants -->
    <div class="flex items-center justify-center flex-col-2">
        <select name="variant_id" id="variant_id_{{$product->id}}" class="w-full p-2 rounded disabled:bg-gray-200">
            @foreach($product->variants as $variant)
            <option value="{{$variant->id}}">{{$variant->name}} @if(!Auth::user()?->is_wholesale()) - ${{$variant->price}}@endif</option>
            @endforeach
        </select>
    </div>

    <!-- Product Buttons -->
    <div class="flex items-center justify-center flex-col-2 gap-2">
        <button type="button" data-favourite="{{$product->id}}" class="w-1/3 p-2 text-white rounded-sm bg-gradient-to-b truncate {{$product->available_on_favourite ? 'fav_available' : 'favourite_btn'}} {{$product->available_on_favourite ? 'from-[#6E6E6E] to-[#424242]' : 'from-[#166EB6] to-[#284297]'}}" {{$product->available_on_favourite ? 'disabled' : ''}}>
            MY LIST
        </button>
        @if($product->in_stock)
        <button type="submit" class="w-2/3 p-2 bg-gradient-to-b from-[#166EB6] to-[#284297] rounded-sm text-white truncate">
            ADD TO CART
        </button>
        @else
        <button type="button" class="w-2/3 p-2 bg-gradient-to-b from-[#B6B6B6] to-[#979797] rounded-sm text-white hover:text-white-500 truncate" disabled>
            OUT OF STOCK
        </button>
        @endif
    </div>
</form>