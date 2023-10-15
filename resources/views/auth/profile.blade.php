@props([
    'user' => null
])

@extends('layouts.app', ['title' => 'Edit Profile'])
@section('content')
<form method="post" action="/profile">
    @if($user) @method('put') @endif
    @csrf
    <div action="" method="post" class="border-2 px-8 pb-8 mb-4 py-4 bg-white rounded">
        <!-- Row 1 -->
        <div class="flex gap-5 mb-4">
            <div class="w-1/2 pr-4">
                <label for="first_name">First Name</label>
            </div>
            <div class="w-1/2">
                <label for="last_name">Last Name</label>
            </div>
        </div>
        <div class="flex gap-5 mb-4">
            <div class="w-1/2 pr-4">
                <input type="text" id="first_name" name="first_name" value="{{old('first_name', $user->first_name ?? null)}}"   class="w-full p-2 border border-gray-400 rounded">
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
            <div class="w-1/2">
                <input type="text" id="last_name" name="last_name" value="{{old('last_name', $user->last_name ?? null)}}"   class="w-full p-2 border border-gray-400 rounded">
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        <!-- Row 4 -->
        <div class="flex gap-5 mb-3">
            <div class="w-1/2 pr-4">
                <label for="phone">Phone</label>
            </div>
            <div class="w-1/2">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="flex gap-5 mb-3">
            <div class="w-1/2 pr-4">
                <input type="text" id="phone" name="phone" value="{{old('phone', $user->phone ?? null)}}"    class="w-full p-2 border border-gray-400 rounded">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div class="w-1/2">
                <input type="text" id="email" name="email" value="{{old('email', $user->email ?? null)}}"   class="w-full p-2 border border-gray-400 rounded">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <!-- Row 3 -->
        <div class="flex gap-5 mb-3">
            <div class="w-1/3 pr-4">
                <label for="street">Current Password</label>
            </div>
            <div class="w-1/3">
                <label for="state">New Password</label>
            </div>
            <div class="w-1/3">
                <label for="state">Confirm Password</label>
            </div>
        </div>
        <div class="flex gap-5 mb-3">
            <div class="w-1/3 pr-4">
                <input type="password" id="street" name="current_password" class="w-full p-2 border border-gray-400 rounded">
                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
            </div>
            <div class="w-1/3">
                <input type="password" id="state" name="password" class="w-full p-2 border border-gray-400 rounded">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="w-1/3">
                <input type="password" id="state" name="password_confirmation" class="w-full p-2 border border-gray-400 rounded">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
    </div>

    <div class="w-full gap-3 mt-5 md:flex">
        <div class="flex flex-col w-full">
            <label for="Billing-address" class="text-lg font-bold">Billing address</label>
            <div class="w-full mt-4 border rounded">
                <div class="w-full p-4" id="billing-details">
                    <div class="px-8 pb-8 mb-4 bg-white rounded" id="billing-form">
                        {{-- name --}}
                        <div class="flex flex-row mb-4">
                            <div class="mb-4 md:mr-2 md:mb-0" style="width: 50%">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="firstname">
                                    First Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 mr-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    type="text" name="billing_first_name" value="{{old('billing_first_name', $user->address_billing->first_name ?? null)}}"  id="" placeholder="First name" />
                                <x-input-error :messages="$errors->get('billing_first_name')" class="mt-2" />
                            </div>
                            <div class="md:ml-2" style="width: 50%">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="lastname">
                                    Last Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    type="text" name="billing_last_name" value="{{old('billing_last_name', $user->address_billing->last_name ?? null)}}"  id="lastname" placeholder="Last name" />
                                <x-input-error :messages="$errors->get('billing_last_name')" class="mt-2" />
                            </div>
                        </div>

                        {{-- company --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                Company Name (optional)
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="company_name" name="billing_company" value="{{old('billing_company', $user->address_billing->company ?? null)}}"  type="text" placeholder="Company Name" />
                            <x-input-error :messages="$errors->get('billing_company')" class="mt-2" />
                        </div>

                        {{-- state --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_region">
                                State
                            </label>
                            <select
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="country" name="billing_state" value="{{old('billing_state', $user->address_billing->state ?? null)}}" >
                                <option class="text-sm" value="California">California</option>
                            </select>
                            <x-input-error :messages="$errors->get('billing_state')" class="mt-2" />
                        </div>

                        {{-- street Address --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="street-address">
                                Street address
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-1 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="" name="billing_address_line_1" value="{{old('billing_address_line_1', $user->address_billing->address_line_1 ?? null)}}"  type="text" placeholder="House number and street name" />
                            <x-input-error :messages="$errors->get('billing_address_line_1')" class="mt-2" />
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="" name="billing_address_line_2" value="{{old('billing_address_line_2', $user->address_billing->address_line_2 ?? null)}}"  type="text" placeholder="Apartment, suite, unit, etc. (optional)" />
                            <x-input-error :messages="$errors->get('billing_address_line_2')" class="mt-2" />
                        </div>

                        {{-- town/city --}}
                        <div class="mb-2">
                            <label  class="block mb-2 text-sm font-semibold text-gray-700" for="towm-city">
                                Town/City
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="" name="billing_city" value="{{old('billing_city', $user->address_billing->city ?? null)}}"  type="text" placeholder="Town/City" />
                            <x-input-error :messages="$errors->get('billing_city')" class="mt-2" />
                        </div>


                        {{-- zip-code --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="zip_code">
                                ZIP Code
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="" name="billing_zip" value="{{old('billing_zip', $user->address_billing->zip ?? null)}}"  type="text" placeholder="Zip Code" />
                            <x-input-error :messages="$errors->get('billing_zip')" class="mt-2" />
                        </div>

                        {{-- phone --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="number">
                                Phone
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="" name="billing_phone" value="{{old('billing_phone', $user->address_billing->phone ?? null)}}"  type="number" placeholder="Phone" />
                            <x-input-error :messages="$errors->get('billing_phone')" class="mt-2" />
                        </div>
                     </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col w-full">
            <label for="Shipping-address" class="text-lg font-bold">
                Shipping address
            </label>
            <div class="w-full mt-4 border rounded">
                <div class="w-full p-4" id="shipping-details">
                    <div class="flex flex-col px-8 mb-4">
                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="ship_to_billing">
                            Shipping address is the same as billing address?
                        </label>
                        <select name="ship_to_billing" id="ship_to_billing" class="p-2 mt-2" onchange="update_shipping_form()">
                            <option value="yes" @if(old('ship_to_billing', $user->address_shipping ? 'no' : 'yes') == 'yes') selected @endif >Yes</option>
                            <option value="no"  @if(old('ship_to_billing', $user->address_shipping ? 'no' : 'yes') == 'no') selected @endif>No</option>
                        </select>
                    </div>
                    <div class="px-8 pb-8 mb-4 bg-white rounded" id="shipping-form">
                        {{-- name --}}
                        <div class="flex flex-row mb-4">
                            <div class="mb-4 md:mr-2 md:mb-0" style="width: 50%">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="firstname">
                                    First Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 mr-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    type="text" name="shipping_first_name" value="{{old('shipping_first_name', $user->address_shipping->first_name ?? null)}}"   id="" placeholder="First name" />
                                <x-input-error :messages="$errors->get('shipping_first_name')" class="mt-2" />
                            </div>
                            <div class="md:ml-2" style="width: 50%">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="lastname">
                                    Last Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    type="text" name="shipping_last_name" value="{{old('shipping_last_name', $user->address_shipping->last_name ?? null)}}"   id="lastname" placeholder="Last name" />
                                <x-input-error :messages="$errors->get('shipping_last_name')" class="mt-2" />
                            </div>
                        </div>

                        {{-- company --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                Company Name (optional)
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="company_name" name="shipping_company" value="{{old('shipping_company', $user->address_shipping->company ?? null)}}"   type="text" placeholder="Company Name" />
                            <x-input-error :messages="$errors->get('shipping_company')" class="mt-2" />
                        </div>

                        {{-- state --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_region">
                                State
                            </label>
                            <select
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="country" name="shipping_state" value="{{old('shipping_state', $user->address_shipping->state ?? null)}}"  >
                                <option class="text-sm" value="California">California</option>
                            </select>
                            <x-input-error :messages="$errors->get('shipping_state')" class="mt-2" />
                        </div>

                        {{-- street Address --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="street-address">
                                Street address
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-1 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="" name="shipping_address_line_1" value="{{old('shipping_address_line_1', $user->address_shipping->address_line_1 ?? null)}}"   type="text" placeholder="House number and street name" />
                            <x-input-error :messages="$errors->get('shipping_address_line_1')" class="mt-2" />
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="" name="shipping_address_line_2" value="{{old('shipping_address_line_2', $user->address_shipping->address_line_2 ?? null)}}"   type="text" placeholder="Apartment, suite, unit, etc. (optional)" />
                            <x-input-error :messages="$errors->get('shipping_address_line_2')" class="mt-2" />
                        </div>

                        {{-- town/city --}}
                        <div class="mb-2">
                            <label  class="block mb-2 text-sm font-semibold text-gray-700" for="towm-city">
                                Town/City
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="" name="shipping_city" value="{{old('shipping_city', $user->address_shipping->city ?? null)}}"   type="text" placeholder="Town/City" />
                            <x-input-error :messages="$errors->get('shipping_city')" class="mt-2" />
                        </div>


                        {{-- zip-code --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="zip_code">
                                ZIP Code
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="" name="shipping_zip" value="{{old('shipping_zip', $user->address_shipping->zip ?? null)}}"   type="text" placeholder="Zip Code" />
                            <x-input-error :messages="$errors->get('shipping_zip')" class="mt-2" />
                        </div>

                        {{-- phone --}}
                        <div class="mb-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700" for="number">
                                Phone
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="" name="shipping_phone" value="{{old('shipping_phone', $user->address_shipping->phone ?? null)}}"   type="number" placeholder="Phone" />
                            <x-input-error :messages="$errors->get('shipping_phone')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-6 flex justify-end">
        <button
            class="px-8 py-2 mr-2 font-bold text-white bg-green-600 rounded hover:bg-green-700">Save</button>
        <button type="button" 
            class="px-8 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-600" disabled>Cancel</button>
    </div>
</form>
<script>
    const ship_to_billing = document.getElementById('ship_to_billing')
    const shipping_form = document.getElementById('shipping-form')
    function update_shipping_form(){
        const option = ship_to_billing.options[ship_to_billing.selectedIndex].value;
        if(option == 'yes'){
            shipping_form.style.display = 'none';
        } else {
            shipping_form.style.display = 'block'
        }
    }

    update_shipping_form();
</script>
@endsection