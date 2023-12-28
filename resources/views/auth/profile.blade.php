@props([
    'user' => null,
    'show_save' => false
])

@extends('layouts.app', ['title' => 'Edit Profile'])
@section('content')
<p class="text-sm">Required Fields(<span class="text-red-600">*</span>)</p>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <br>
        <a href="{{ session('shop_url') }}" class="p-2 rounded bg-green-400 text-white/60 my-2">Proceed to Shop</a>
    </div>
@endif
<form method="post" action="/profile">
    @if($user) @method('put') @endif
    @csrf
    <div action="" method="post" class="border-2 px-8 pb-8 mb-4 py-4 bg-white rounded">
        <!-- Row 1 -->
        <div class="flex gap-5 mb-4">
            <div class="w-1/2 pr-4">
                <label for="first_name">First Name <span class="text-red-600">*</span> </label>
            </div>
            <div class="w-1/2">
                <label for="last_name">Last Name <span class="text-red-600">*</span></label>
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
                <label for="phone">Phone <span class="text-red-600">*</span></label>
            </div>
            <div class="w-1/2">
                <label for="email">Email <span class="text-red-600">*</span></label>
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

        <div class="border-2 p-3">
            <p class="my-2 font-bold">Reset Password Option</p>
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
    </div>

    <div class="flex w-full">
        <div class="flex gap-8 w-full border rounded p-8">
            <x-addresses :user="$user" :show_save="false"/>
        </div>
    </div>

    <div class="mt-6 flex justify-end md:gap-2">
            <button class="px-8 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-600">
                Save 
            </button>
        <button type="button" 
            class="px-8 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-600" disabled>Cancel</button>
    </div>
</form>
@endsection