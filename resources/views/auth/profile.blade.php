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
        <button
            class="px-8 py-2 mr-2 font-bold text-white bg-green-600 rounded hover:bg-green-700">Save</button>
        <button type="button" 
            class="px-8 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-600" disabled>Cancel</button>
    </div>
</form>
@endsection