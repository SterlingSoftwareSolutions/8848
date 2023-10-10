<tr class="font-light bg-white border border-black">

    <!-- Image -->
    <td scope="row" class="w-3/12 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <img src="{{$cartitem->variant->product->image_1_url}}" alt="Image Description" class="w-3/12 sm:w-6/12"/>
    </td>
    <!-- Product Name -->
    <td class="w-3/12 px-6 py-4 text-blue-900 text-start">
        {{$cartitem->variant->product->title}}
    </td>
    <!-- Variant -->
    <td class="w-3/12 px-6 py-4 text-blue-900 text-start">
        {{$cartitem->variant->name}}
    </td>
    <!-- Price -->
    <td class="w-1/12 px-6 py-4">
        ${{$cartitem->variant->price}}
    </td>
    <!-- Quantity -->
    <td class="flex items-center justify-center px-6 py-8 mt-8 space-x-2">
        <div class="flex flex-row w-[150px] md:flex-row custom-number-input border-[2px] border-[#1670B7] rounded-md">
            <!-- Decrease Button -->
            <button type="button" data-action="decrement" class="w-10 h-10 text-gray-600 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400 md:h-full md:w-20">
                <span class="m-auto text-2xl font-thin">−</span>
            </button>
            <!-- Input Field -->
            <input type="number" class="flex items-center w-16 font-semibold text-center text-gray-700 outline-none cursor-default focus:outline-none md:w-full text-md md:text-base" name="variant_quantity_{{$cartitem->variant->id}}" min="1" value="{{$cartitem->quantity}}">
            <!-- Increase Button -->
            <button type="button" data-action="increment" class="w-10 h-10 text-gray-600 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400 md:h-full md:w-20">
                <span class="m-auto text-2xl font-thin">+</span>
            </button>
        </div>
    </td>
    <!-- Subtotal -->
    <td class="w-2/12 px-6 py-4 text-blue-900">
        ${{$cartitem->variant->price * $cartitem->quantity}}
    </td>

    <!-- Delete icon -->
    <td class="px-6 py-4">
        <form action="/cart/remove/" method="post" id="cart_remove_{{$cartitem->id}}">
            @csrf
            <input type="hidden" value="{{$cartitem->variant->id}}" name="variant_id">
            <button type="submit" form="cart_remove_{{$cartitem->id}}"><i class="w-1/12 fa-solid fa-trash-can"></i></button>
        </form>
    </td>
</tr>