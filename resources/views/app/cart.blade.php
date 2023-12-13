@extends('layouts.app', ['title' => 'Cart'])
@section('content')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cart</title>
</head>

<form method="post" id="cart_form">
@csrf
    <!-- Table -->
    <div class="relative overflow-x-auto">
        <table class="w-full text-xl font-light text-center text-gray-500 ">
            <thead class="text-lg font-light capitalize text-gray-6600">
                <!-- Table Headings -->
                <tr>
                    <th scope="col" class="w-3/12 px-2 py-3 text-start md:w-2/12">
                        Product
                    </th>
                    <th scope="col" class="w-3/12 px-2 py-3 md:w-2/12">

                    </th>
                    <th scope="col" class="w-3/12 px-2 py-3 text-start md:w-2/12">
                        Variant
                    </th>
                    @if (!auth()->user()->is_wholesale())
                    <th scope="col" class="w-1/12 px-2 py-3 md:w-2/12">
                        Price
                    </th>
                    @endif
                    <th scope="col" class="w-2/12 px-2 py-3 md:w-2/12">
                        Quantity
                    </th>
                    @if (!auth()->user()->is_wholesale())
                    <th scope="col" class="w-2/12 px-2 py-3 md:w-2/12">
                        Subtotal
                    </th>
                    @endif
                    <th scope="col" class="w-1/12 px-2 py-3 md:w-2/12">

                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through cart items -->
                @foreach($items as $item)
                <x-cart-item :cartitem="$item" />
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Button Section -->
    <div class="flex flex-col mt-5">
        <!-- Update Cart Button -->
        <div class="flex justify-end">
            <div class="md:w-4/12 lg:w-4/12 sm:w-64">
                <button form="cart_form" type="submit" class="w-full h-12 text-white uppercase bg-blue-800">
                    Update Cart
                </button>
            </div>
        </div>
        @if (!auth()->user()->is_wholesale())
        <!-- Total Price Display -->
        <div class="flex flex-row justify-end mt-3">
            <div class="flex flex-row border border-black md:h-14 md:w-4/12 lg:w-4/12 sm:w-64">
                <div class="flex items-center justify-start w-1/2 place-items-start">
                    <p class="ml-3 text-gray-500">Total</p>
                </div>
                <div class="flex items-center justify-end w-1/2 place-items-end">
                    <p class="mr-3">${{$total_price}}</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</form>
<!-- Checkout Button -->
<div class="flex justify-end">
    <div class="h-12 mt-3 md:w-4/12 lg:w-4/12 sm:w-64">
        @if(Auth::user()->is_wholesale())
        <form action="/place-order" id="order_form" method="post">
            @csrf
            <textarea class="w-full border-2 mb-3 p-2" placeholder="Order Notes" name="notes"></textarea>
            <button form="order_form" type="submit" class="w-full h-12 text-white uppercase bg-blue-800">
                Place Order
            </button>
        </form>
        @else
        <a href="/checkout">
            <button type="button" class="w-full h-full text-white uppercase bg-blue-800">
                Checkout
            </button>
        </a>
        @endif
    </div>
</div>
<script>
    // JavaScript to handle increment and decrement actions
    const inputElement = document.querySelector('input[name="custom-input-number"]');
    const incrementButton = document.querySelector('[data-action="increment"]');
    const decrementButton = document.querySelector('[data-action="decrement"]');

    incrementButton.addEventListener('click', () => {
        inputElement.value = parseInt(inputElement.value) + 1;
    });

    decrementButton.addEventListener('click', () => {
        const value = parseInt(inputElement.value);
        if (value > 0) {
            inputElement.value = value - 1;
        }
    });
</script>
@endsection