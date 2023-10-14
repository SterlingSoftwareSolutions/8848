@extends('layouts.app', [
'title' => 'Checkout ',
'parent' => ['name' => 'Cart', 'url' => '/cart']
])

@section('content')
<form action="/checkout" method="post">
    @csrf
    <div class="flex gap-4">
        <div class="flex flex-col w-full">
            <div class="w-full border rounded">
                <div class="w-full col-span-2 p-2 mt-2 ml-4 border-gray-200">Returning customer? <span class="text-blue-400">Click here to login</span></div>
            </div>

            {{-- Address box --}}
            <div class="w-full mt-4 border rounded">
                <div class="py-5">
                    <h1 class="ml-4 font-bold text-left text-black text-md">Billing Details</h1>
                </div>
                <div class="mt-2">
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        {{-- name --}}
                        <div class="flex flex-row mb-4">
                            <div class="mb-4 md:mr-2 md:mb-0" style="width: 50%">
                                <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="firstname">
                                    First Name
                                </label>
                                <input class="w-full px-3 py-2 mr-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="" id="" placeholder="First name" />
                            </div>
                            <div class="md:ml-2" style="width: 50%">
                                <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="lastname">
                                    Last Name
                                </label>
                                <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="" id="lastname" placeholder="Last name" />
                            </div>
                        </div>

                        {{-- company --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                Company Name (optional)
                            </label>
                            <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="company_name" type="text" placeholder="Company Name" />
                        </div>

                        {{-- country/region --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="company_region">
                                Country/Region
                            </label>
                            <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="country" id="country">
                                <option class="text-sm" value="">US</option>
                            </select>
                        </div>

                        {{-- street Address --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="street-address">
                                Street address
                            </label>
                            <input class="w-full px-3 py-2 mb-1 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" type="text" placeholder="House number and street name" />
                            <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Apartment, suite, unit, etc. (optional)" />
                        </div>

                        {{-- town/city --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="towm-city">
                                Town/City
                            </label>
                            <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Town/City" />
                        </div>

                        {{-- state --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="state">
                                State
                            </label>
                            <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="state" id="state">
                                <option class="text-sm" value="">California</option>
                            </select>
                        </div>

                        {{-- zip-code --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="zip_code">
                                ZIP Code
                            </label>
                            <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Zip Code" />
                        </div>

                        {{-- phone --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="number">
                                Phone
                            </label>
                            <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" type="number" placeholder="Phone" />
                        </div>

                        {{-- email --}}
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="email">
                                Email Address
                            </label>
                            <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none" id="email" type="email" placeholder="Email" />
                        </div>
                        <hr class="mb-6 border-t" />
                        <div class="text-sm text-left">
                            <input id="create-account" name="account-type" type="radio" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600">
                            <span class="ml-2">Ship to defult shipping address</span>
                            <div class="w-full p-4 mt-4 border rounded" id="account-details" style="display: none;">
                                <div class="w-full mt-4 border rounded">
                                    <div class="w-full p-4" id="shipping-details">
                                        <div class="px-8 pb-8 mb-4 bg-white rounded" id="shipping-form">
                                            {{-- name --}}
                                            <div class="flex flex-row mb-4">
                                                <div class="mb-4 md:mr-2 md:mb-0" style="width: 50%">
                                                    <label class="block mb-2 text-sm font-semibold text-gray-700" for="firstname">
                                                        First Name
                                                    </label>
                                                    <input class="w-full px-3 py-2 mr-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="shipping_first_name" value="{{old('shipping_first_name', $user->address_shipping->first_name ?? null)}}" id="" placeholder="First name" />
                                                    <x-input-error :messages="$errors->get('shipping_first_name')" class="mt-2" />
                                                </div>
                                                <div class="md:ml-2" style="width: 50%">
                                                    <label class="block mb-2 text-sm font-semibold text-gray-700" for="lastname">
                                                        Last Name
                                                    </label>
                                                    <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="shipping_last_name" value="{{old('shipping_last_name', $user->address_shipping->last_name ?? null)}}" id="lastname" placeholder="Last name" />
                                                    <x-input-error :messages="$errors->get('shipping_last_name')" class="mt-2" />
                                                </div>
                                            </div>

                                            {{-- company --}}
                                            <div class="mb-2">
                                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                                    Company Name (optional)
                                                </label>
                                                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="company_name" name="shipping_company" value="{{old('shipping_company', $user->address_shipping->company ?? null)}}" type="text" placeholder="Company Name" />
                                                <x-input-error :messages="$errors->get('shipping_company')" class="mt-2" />
                                            </div>

                                            {{-- state --}}
                                            <div class="mb-2">
                                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_region">
                                                    State
                                                </label>
                                                <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="country" name="shipping_state" value="{{old('shipping_state', $user->address_shipping->state ?? null)}}">
                                                    <option class="text-sm" value="California">California</option>
                                                </select>
                                                <x-input-error :messages="$errors->get('shipping_state')" class="mt-2" />
                                            </div>

                                            {{-- street Address --}}
                                            <div class="mb-2">
                                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="street-address">
                                                    Street address
                                                </label>
                                                <input class="w-full px-3 py-2 mb-1 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="shipping_address_line_1" value="{{old('shipping_address_line_1', $user->address_shipping->address_line_1 ?? null)}}" type="text" placeholder="House number and street name" />
                                                <x-input-error :messages="$errors->get('shipping_address_line_1')" class="mt-2" />
                                                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="shipping_address_line_2" value="{{old('shipping_address_line_2', $user->address_shipping->address_line_2 ?? null)}}" type="text" placeholder="Apartment, suite, unit, etc. (optional)" />
                                                <x-input-error :messages="$errors->get('shipping_address_line_2')" class="mt-2" />
                                            </div>

                                            {{-- town/city --}}
                                            <div class="mb-2">
                                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="towm-city">
                                                    Town/City
                                                </label>
                                                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="shipping_city" value="{{old('shipping_city', $user->address_shipping->city ?? null)}}" type="text" placeholder="Town/City" />
                                                <x-input-error :messages="$errors->get('shipping_city')" class="mt-2" />
                                            </div>


                                            {{-- zip-code --}}
                                            <div class="mb-2">
                                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="zip_code">
                                                    ZIP Code
                                                </label>
                                                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="shipping_zip" value="{{old('shipping_zip', $user->address_shipping->zip ?? null)}}" type="text" placeholder="Zip Code" />
                                                <x-input-error :messages="$errors->get('shipping_zip')" class="mt-2" />
                                            </div>

                                            {{-- phone --}}
                                            <div class="mb-2">
                                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="number">
                                                    Phone
                                                </label>
                                                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="shipping_phone" value="{{old('shipping_phone', $user->address_shipping->phone ?? null)}}" type="number" placeholder="Phone" />
                                                <x-input-error :messages="$errors->get('shipping_phone')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-6 border-t" />
                        <div class="mt-4 text-sm">
                            <input id="ship-to-different-address" name="ship-to-different-address" type="radio" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600">
                            <span class="ml-2">Ship to different address?</span>
                            <div id="shipping-address-section" style="display: none;">
                                {{-- name --}}
                                <div class="flex flex-row mt-4">
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="firstname">
                                            First Name
                                        </label>
                                        <input class="w-full px-3 py-2 mr-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="" id="" placeholder="First name" />
                                    </div>
                                    <div class="md:ml-2">
                                        <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="lastname">
                                            Last Name
                                        </label>
                                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="" id="lastname" placeholder="Last name" />
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="company_name">
                                        Company Name (optional)
                                    </label>
                                    <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="company_name" type="text" placeholder="Company Name" />
                                </div>

                                {{-- city --}}
                                <div class="mb-2">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="towm-city">
                                        City/Region
                                    </label>
                                    <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Town/City" />
                                </div>

                                {{-- state --}}
                                <div class="mb-2">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="state">
                                        State
                                    </label>
                                    <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="state" id="state">
                                        <option class="text-sm" value="">California</option>
                                    </select>
                                </div>

                                {{-- street Address --}}
                                <div class="mb-2">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="street-address">
                                        Street address
                                    </label>
                                    <input class="w-full px-3 py-2 mb-1 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" type="text" placeholder="House number and street name" />
                                </div>

                                {{-- phone --}}
                                <div class="mb-2">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500" for="number">
                                        Phone
                                    </label>
                                    <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" type="number" placeholder="Phone" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="inputBox" style="display: none;">
                        <div class="w-full mt-4 border rounded">
                            <div class="w-full p-4" id="shipping-details">
                                <div class="px-8 pb-8 mb-4 bg-white rounded" id="shipping-form">
                                    {{-- name --}}
                                    <div class="flex flex-row mb-4">
                                        <div class="mb-4 md:mr-2 md:mb-0" style="width: 50%">
                                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="firstname">
                                                First Name
                                            </label>
                                            <input class="w-full px-3 py-2 mr-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="shipping_first_name" value="{{old('shipping_first_name', $user->address_shipping->first_name ?? null)}}" id="" placeholder="First name" />
                                            <x-input-error :messages="$errors->get('shipping_first_name')" class="mt-2" />
                                        </div>
                                        <div class="md:ml-2" style="width: 50%">
                                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="lastname">
                                                Last Name
                                            </label>
                                            <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="shipping_last_name" value="{{old('shipping_last_name', $user->address_shipping->last_name ?? null)}}" id="lastname" placeholder="Last name" />
                                            <x-input-error :messages="$errors->get('shipping_last_name')" class="mt-2" />
                                        </div>
                                    </div>

                                    {{-- company --}}
                                    <div class="mb-2">
                                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                            Company Name (optional)
                                        </label>
                                        <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="company_name" name="shipping_company" value="{{old('shipping_company', $user->address_shipping->company ?? null)}}" type="text" placeholder="Company Name" />
                                        <x-input-error :messages="$errors->get('shipping_company')" class="mt-2" />
                                    </div>

                                    {{-- state --}}
                                    <div class="mb-2">
                                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_region">
                                            State
                                        </label>
                                        <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="country" name="shipping_state" value="{{old('shipping_state', $user->address_shipping->state ?? null)}}">
                                            <option class="text-sm" value="California">California</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('shipping_state')" class="mt-2" />
                                    </div>

                                    {{-- street Address --}}
                                    <div class="mb-2">
                                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="street-address">
                                            Street address
                                        </label>
                                        <input class="w-full px-3 py-2 mb-1 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="shipping_address_line_1" value="{{old('shipping_address_line_1', $user->address_shipping->address_line_1 ?? null)}}" type="text" placeholder="House number and street name" />
                                        <x-input-error :messages="$errors->get('shipping_address_line_1')" class="mt-2" />
                                        <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="shipping_address_line_2" value="{{old('shipping_address_line_2', $user->address_shipping->address_line_2 ?? null)}}" type="text" placeholder="Apartment, suite, unit, etc. (optional)" />
                                        <x-input-error :messages="$errors->get('shipping_address_line_2')" class="mt-2" />
                                    </div>

                                    {{-- town/city --}}
                                    <div class="mb-2">
                                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="towm-city">
                                            Town/City
                                        </label>
                                        <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="shipping_city" value="{{old('shipping_city', $user->address_shipping->city ?? null)}}" type="text" placeholder="Town/City" />
                                        <x-input-error :messages="$errors->get('shipping_city')" class="mt-2" />
                                    </div>


                                    {{-- zip-code --}}
                                    <div class="mb-2">
                                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="zip_code">
                                            ZIP Code
                                        </label>
                                        <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="shipping_zip" value="{{old('shipping_zip', $user->address_shipping->zip ?? null)}}" type="text" placeholder="Zip Code" />
                                        <x-input-error :messages="$errors->get('shipping_zip')" class="mt-2" />
                                    </div>

                                    {{-- phone --}}
                                    <div class="mb-2">
                                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="number">
                                            Phone
                                        </label>
                                        <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="shipping_phone" value="{{old('shipping_phone', $user->address_shipping->phone ?? null)}}" type="number" placeholder="Phone" />
                                        <x-input-error :messages="$errors->get('shipping_phone')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col w-full md:w-7/12">
            {{-- order box --}}
            <div class="w-full p-6 mt-4 mb-6 border rounded md:w-11/12 md:mt-0">
                <div class="py-1">
                    <h1 class="font-bold text-center text-black text-md">Your Order</h1>
                </div>
                <div class="mt-2">
                    <table class="w-full">
                        <tr class="ml-2 font-semibold text-gray-500">
                            <td>Product</td>
                            <td>Subtotal</td>
                        </tr>

                        <tr>
                            <td class="flex">
                                <label class="py-2">8848 Test Product 01</label>
                            </td>
                            <td>$30.00</td>
                        </tr>
                        <tr class="ml-2 font-semibold text-gray-500">
                            <td>Sub Total</td>
                            <td>$30.00</td>
                        </tr>
                        <tr class="ml-2 font-semibold text-gray-500">
                            <td>Discounts</td>
                            <td>$10.00</td>
                        </tr>
                        <tr class="ml-2 font-semibold text-gray-500">
                            <td>Total</td>
                            <td>$30.00</td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Bank transfer box --}}
            <div class="w-full border rounded md:w-11/12">
                <fieldset>
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center ml-3 gap-x-3">
                            <input id="push-everything" name="push-notifications" type="radio" class="w-4 h-3 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                            <label class="text-sm text-left text-gray-500">Direct bank transfer</label>
                        </div>
                        <div class="flex items-center ml-3 gap-x-3">
                            <input id="push-email" name="push-notifications" type="radio" class="w-4 h-3 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                            <h1 class="text-sm text-left text-gray-500">Cash on Delivey</h1>
                        </div>
                        <div class="flex items-center ml-3 gap-x-3">
                            <input id="push-nothing" name="push-notifications" type="radio" class="w-4 h-3 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                            <h1 class="text-sm text-left text-gray-500">Paypal</h1>
                        </div>
                    </div>
                </fieldset>
                <div class="p-3 ml-4 mr-4 text-[13px] text-gray-500 bg-gray-200 mt-4">
                    Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <span class="text-blue-500">privacy policy.</span>
                </div>
                <div class="mt-2 ml-4 text-[12px] text-gray-500 after:content-['*'] after:ml-0.5 after:text-red-500">
                    <input id="accept" name="accept" type="radio" class="w-4 h-3 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                    I have read and agree to the website terms and conditions
                </div>
                <div class="p-3">
                    <button type="submit" class="px-10 py-3 mt-3 text-white border-2 rounded-lg bg-gradient-to-b from-[#166EB6] to-[#284297] text-1xl md:mt-10 w-full">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Your HTML code remains the same -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const shipToDefault = document.getElementById("create-account");
        const shipToDifferent = document.getElementById("ship-to-different-address");
        const accountDetails = document.getElementById("account-details");
        const shippingAddressSection = document.getElementById("shipping-address-section");

        shipToDefault.addEventListener("click", function() {
            if (shipToDefault.checked) {
                accountDetails.style.display = "block";
                shippingAddressSection.style.display = "none";
                shipToDifferent.checked = false;
            } else {
                accountDetails.style.display = "none";
            }
        });

        shipToDifferent.addEventListener("click", function() {
            if (shipToDifferent.checked) {
                shippingAddressSection.style.display = "block";
                accountDetails.style.display = "none";
                shipToDefault.checked = false;
            } else {
                shippingAddressSection.style.display = "none";
            }
        });
    });
</script>


@endsection