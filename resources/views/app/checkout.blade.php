@extends('layouts.app', [
    'title' => 'Checkout '
])

@section('content')
<form action="/checkout" method="post" id="payment-form">
    @csrf
    @if(session()->has('error'))
        <div class="p-4 mb-4 text-red-800 bg-red-100 rounded">
            {{ session()->get('error') }}
        </div>
    @endif

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
            <div class="w-full border rounded p-2">
                <div class="flex flex-col p-4 gap-2">
                    <p class="text-gray-500">Enter your payment details</p>
                    <input class="border w-full rounded shadow p-2 focus:outline-none" type="text" name="card_holder_name" id="card-holder-name" placeholder="Name on card">
                    <div id="card-number" class="border w-full rounded shadow p-2"></div>
                    <div id="card-cvc" class="border w-full rounded shadow p-2"></div>
                    <div id="card-expiry" class="border w-full rounded shadow p-2"></div>
                    <div id="card-errors" class="w-full text-red-600"></div>
                </div>
                <div class="p-3 mx-4 text-[13px] text-gray-500 rounded bg-gray-200">
                    Your personal data will be used to process your order, support your experience throughout this website.
                </div>
                <div class="p-4">
                    <textarea class="w-full p-3 text-[13px] border rounded shadow focus:outline-none" name="notes" placeholder="Order notes"></textarea>
                </div>
                <div class="p-3">
                    <button id="card-button" type="button" class="px-10 py-3 text-white border-2 rounded-lg bg-gradient-to-b from-[#166EB6] to-[#284297] text-1xl w-full">
                        Place Order</button>
                </div>
                <div class="flex gap-2 mt-2 my-4 mx-4 text-[12px] text-gray-500">
                    <input id="dont_clear_cart" name="dont_clear_cart" type="checkbox" value="1" class="h-4 w-4 shadow" @checked(old('dont_clear_cart'))>
                    <label for="dont_clear_cart" class="text-[12px] text-gray-500">Don't clear the cart.</label>
                </div>
            </div>

            <script src="https://js.stripe.com/v3/"></script>

            <script>
                cardDetails = document.getElementById('card_details');

                const stripe = Stripe('{{ env('STRIPE_KEY') }}');
                const errorElement = document.getElementById('card-errors');
                const form = document.getElementById("payment-form")
                const elements = stripe.elements();

                var elementStyles = {
                    base: {
                        color: '#212121',
                        fontSize: '16px',
                        ':focus': {
                            color: '#212121',
                        },

                        '::placeholder': {
                            color: '#757575',
                        },

                        ':focus::placeholder': {
                            color: '#616161',
                        },
                    },
                    invalid: {
                        color: '#b71c1c',
                        ':focus': {
                            color: '#b71c1c',
                        },
                        '::placeholder': {
                            color: '#e57373',
                        },
                    },
                };

                const cardNumberElement = elements.create('cardNumber', {
                    style: elementStyles,
                    showIcon: true,

                });
                const cardExpiryElement = elements.create('cardExpiry', {
                    style: elementStyles
                });
                const cardCvcElement = elements.create('cardCvc', {
                    style: elementStyles
                });

                cardNumberElement.mount('#card-number');
                cardExpiryElement.mount('#card-expiry');
                cardCvcElement.mount('#card-cvc');

                const cardHolderName = document.getElementById('card-holder-name');
                const cardButton = document.getElementById('card-button');

                cardButton.addEventListener('click', async (e) => {
                    const {
                        paymentMethod,
                        error
                    } = await stripe.createPaymentMethod(
                        'card', cardNumberElement, {
                        billing_details: {
                            name: cardHolderName.value
                        },
                    }
                    );

                    if (error) {
                        errorElement.style.display = 'block';
                        errorElement.textContent = error.message;
                    } else {
                        errorElement.style.display = 'none';
                        errorElement.textContent = "";

                        var hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'payment_method');
                        hiddenInput.setAttribute('value', paymentMethod.id);
                        form.appendChild(hiddenInput);
                        form.submit();
                    }
                });
            </script>
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
