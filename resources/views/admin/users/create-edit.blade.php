@props([
    'user' => null
])
@extends('layouts.admin') @section('content')
<div class="container p-6 mx-auto ">
    <form method="post" @if($user) action="/admin/users/{{$user->id}}" @else action="/admin/users" @endif>
        @if($user) @method('put') @endif
        @csrf
        <div class="md:mb-5">
            <h1 class="text-lg font-bold">@if($user) Edit Customer @else Add Customer @endif</h1>
        </div>
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
                <div class="w-1/2 pr-4">
                    <label for="street">Password</label>
                </div>
                <div class="w-1/2">
                    <label for="state">Confirm Password</label>
                </div>
            </div>
            <div class="flex gap-5 mb-3">
                <div class="w-1/2 pr-4">
                    <input type="password" id="street" name="password" class="w-full p-2 border border-gray-400 rounded">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <input type="password" id="state" name="password_confirmation" class="w-full p-2 border border-gray-400 rounded">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <!-- Row 5 -->
            <div class="flex gap-5 mb-3">
                <div class="w-1/2">
                    <label for="customer_type">Customer Type</label>
                </div>
                <div class="w-1/2">
                    <label for="priority_level">Priority Level</label>
                </div>
            </div>
            <div class="flex mb-3">
                <div class="w-1/2 pr-5">
                    <select id="role" name="role" class="w-full p-2 border border-gray-400 rounded">
                        <option value="client_wholesale" @if(($user->role ?? '') ==  'client_wholesale') selected @endif>Wholesale Customer</option>
                        <option value="client_retail" @if(($user->role ?? '') == 'client_retail') selected @endif>Retail Customer</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
                <div class="w-1/2 pl-2">
                    <select id="priority_level" name="priority" value="{{old('priority', $user?->priority)}}"   class="w-full p-2 border border-gray-400 rounded">
                        <option value="high" @if(old('priority', $user?->priority) == 'high') selected @endif>High Priority</option>
                        <option value="medium" @if(old('priority', $user?->priority) == 'medium') selected @endif>Medium Priority</option>
                        <option value="low" @if(old('priority', $user?->priority) == 'low') selected @endif>Low Priority</option>
                    </select>
                    <x-input-error :messages="$errors->get('priority')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="w-full gap-3 mt-5 md:flex">
            <div class="flex flex-col w-full">
                <label for="Billing-address" class="text-lg font-bold">Billing address</label>
                <div class="w-full mt-4 border rounded">
                    <div class="w-full p-4" id="billing-details">
                        <div class="px-8 pb-8 mb-4 bg-white rounded" id="billing-form">
                            <x-address-form :prefix=" 'billing_' " :address="$user?->address_billing"/>
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
                        <div class="px-8 pb-8 mb-4 bg-white rounded" id="shipping-form">
                            <x-address-form :prefix=" 'shipping_' " :address="$user?->address_shipping"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <button class="px-8 py-2 mr-2 font-bold text-white bg-green-600 rounded hover:bg-green-700">Save</button>
            <a href="/admin/users"><button type="button" class="px-8 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-600">Cancel</button></a>
        </div>
    </form>
</div>
@endsection
