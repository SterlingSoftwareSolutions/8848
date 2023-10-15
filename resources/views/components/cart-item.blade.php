<tr class="font-light bg-white border border-black">

    <!-- Image -->
    <td scope="row"
        class="w-full md:w-3/12 px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center md:text-left">
        <img src="{{$cartitem->variant->product->image_1_url}}" alt="Image Description"
            class="w-full sm:w-6/12 md:mx-auto md:w-full" />
    </td>
    <!-- Product Name -->
    <td class="w-3/12 px-6 py-4 text-blue-900 text-center md:text-left">
        {{$cartitem->variant->product->title}}
    </td>
    <!-- Variant -->
    <td class="w-3/12 px-6 py-4 text-blue-900 text-center md:text-left">
        {{$cartitem->variant->name}}
    </td>
    <!-- Price -->
    @if (!auth()->user()->is_whsl_user())
    <td class="w-1/12 px-6 py-4 text-center md:text-left">
        ${{$cartitem->variant->price}}
    </td>
    @endif
    <!-- Quantity -->
    <td class="w-2/12 px-6 py-8 mt-4 text-center md:mt-0 md:text-left">
        <div
            class="md:flex items-center md:justify-center md:mt-0 custom-number-input border-2 border-#1670B7 rounded-md">
            <!-- Decrease Button -->
            <button type="button" data-action="decrement"
                class="w-8 h-8 md:w-10 md:h-10 text-gray-600 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400">
                <span class="m-auto text-md font-thin">−</span>
            </button>
            <!-- Input Field -->
            <input type="number"
                class="flex items-center w-10 font-semibold text-center text-gray-700 outline-none cursor-default focus:outline-none text-md"
                name="variant_quantity_{{$cartitem->variant->id}}" min="1" value="{{$cartitem->quantity}}">
            <!-- Increase Button -->
            <button type="button" data-action="increment"
                class="w-8 h-8 md:w-10 md:h-10 text-gray-600 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400">
                <span class="m-auto text-md font-thin">+</span>
            </button>
        </div>
    </td>
    <!-- Subtotal -->
    @if (!auth()->user()->is_whsl_user())
    <td class="w-2/12 px-6 py-4 text-blue-900 text-center md:text-left">
        ${{$cartitem->variant->price * $cartitem->quantity}}
    </td>
    @endif

    <!-- Delete icon -->
    <td class="px-6 py-4 text-center md:text-left">
        <form action="/cart/remove/" method="post" id="cart_remove_{{$cartitem->id}}">
            @csrf
            <input type="hidden" value="{{$cartitem->variant->id}}" name="variant_id">
            <button type="submit" form="cart_remove_{{$cartitem->id}}"><i
                    class="w-1/12 fa-solid fa-trash-can"></i></button>
        </form>
    </td>
</tr>