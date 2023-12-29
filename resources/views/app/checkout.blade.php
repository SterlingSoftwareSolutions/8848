@extends('layouts.app', [
    'title' => 'Checkout '
])

@section('content')
<form action="/checkout" method="post">
    @csrf
    <div class="flex gap-4">
        <div class="flex flex-col w-8/12">
            <div class="flex flex-col gap-8 w-full border rounded p-8">
                <x-addresses :user="$user" :show_save="true"/>
            </div>
        </div>

        <div class="flex flex-col w-4/12">
            {{-- order box --}}
            <div class="w-full p-6 mt-4 mb-6 border rounded md:mt-0">
                <div class="py-1">
                    <h1 class="font-bold text-center text-black text-md">Your Order</h1>
                </div>
                <div class="mt-2  rounded">
                    <table class="w-full ">
                        <tr class="ml-2 font-bold text-gray-600">
                            <td class="pb-4">Product</td>
                            <td class="pb-4">Subtotal</td>
                        </tr>
                        @foreach($cart_items as $item)
                        <tr>
                            <td class="flex">
                                <label class="py-2">{{$item?->variant?->product?->title}} x {{$item?->quantity}}</label>
                            </td>
                            <td>${{ number_format($item?->variant?->price * $item->quantity, 2)}}</td>
                        </tr>
                        @endforeach
                        <tr class="ml-2 font-bold text-gray-600">
                            <td class="pt-4">Total</td>
                            <td class="pt-4">${{number_format($cart_total, 2)}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Bank transfer box --}}
            <div class="w-full border rounded">
                <fieldset>
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center ml-3 gap-x-3">
                            <input id="push-everything" name="push-notifications" type="radio"
                                class="w-4 h-3 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                            <label class="text-sm text-left text-gray-500">Direct bank transfer</label>
                        </div>
                        <div class="flex items-center ml-3 gap-x-3">
                            <input disabled id="push-email" name="push-notifications" type="radio"
                                class="w-4 h-3 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                            <h1 class="text-sm text-left text-gray-500">Cash on Delivey</h1>
                        </div>
                        <div class="flex items-center ml-3 gap-x-3">
                            <input disabled id="push-nothing" name="push-notifications" type="radio"
                                class="w-4 h-3 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                            <h1 class="text-sm text-left text-gray-500">Paypal</h1>
                        </div>
                    </div>
                </fieldset>
                <div class="p-3 ml-4 mr-4 text-[13px] text-gray-500 bg-gray-200 mt-4">
                    Your personal data will be used to process your order, support your experience throughout this website.
                    <!-- website, and for other purposes described in our <a href="" class="text-blue-500 underline">privacy policy.</a> -->
                </div>
                <div class="p-4">
                    <textarea class="w-full p-3 text-[13px] border border-gray-500" name="notes" placeholder="Order notes"></textarea>
                </div>
                <!-- <div class="mt-2 ml-4 text-[12px] text-gray-500 after:content-['*'] after:ml-0.5 after:text-red-500">
                    <input id="accept" name="accept" type="checkbox"
                        class="w-4 h-3 text-indigo-600 border-gray-300 focus:ring-indigo-600" required>
                    I have read and agree to the website terms and conditions
                </div> -->
                <div class="p-3">
                    <button type="submit"
                        class="px-10 py-3 mt-3 text-white border-2 rounded-lg bg-gradient-to-b from-[#166EB6] to-[#284297] text-1xl w-full">Place
                        Order</button>
                </div>
                <div class="flex gap-2 mt-2 my-4 mx-4 text-[12px] text-gray-500">
                    <input id="dont_clear_cart" name="dont_clear_cart" type="checkbox" value="1" class="h-4 w-4 shadow" @checked(old('dont_clear_cart'))>
                    <label for="dont_clear_cart" class="text-[12px] text-gray-500">Don't clear the cart.</label>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    ship_elsewhere = document.getElementById('ship_elsewhere');
    shipping_address_form = document.getElementById('shipping_form');

    function ship_elsewhere_update(){
        if(ship_elsewhere.checked){
            shipping_address_form.style.display = 'block';
        } else{
            shipping_address_form.style.display = 'none';
        }
    }

    ship_elsewhere_update();
</script>
@endsection
