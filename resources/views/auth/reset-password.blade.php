@extends('layouts.app', [
'title' => 'Reset Password',
'fullwidth' => true
])

@section('content')
<div class="flex flex-col items-center min-h-screen bg-gray-100 sm:justify-center bg-cover" style="background-image: url('/images/background.jpg');">
    <div class="w-full px-8 py-4 overflow-hidden shadow-md bg-gradient-to-b from-[#166EB6] to-[#284297] sm:max-w-md sm:rounded-lg">
        {{-- bg image overlay --}}
        <div class="inset-0 bg-blue-700 bg-opacity-50" style="background-image: url('/images/image.jpg'); opacity: 0.1;"></div>

        <div class="w-full px-8 py-4 overflow-hidden bg-none sm:max-w-md sm:rounded-lg">

        <div class="flex justify-center mt-3 mb-5 text-white text-2xl font-bold">
            <h1>
                Reset Password
            </h1>
        </div>

        <p class="text-[12px] text-gray-200 text-center">Enter a new password for the account <b>{{$email}}</b></p>

            <form method="POST" class="mt-4 flex flex-col gap-4 justify-center">
                @csrf

                <input type="hidden" name="token" value="{{$token}}">

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-[#d9d9d9]">Password</label>
                    <input id="password" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password" :value="old('password')" required autofocus autocomplete="username" placeholder="Password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-[#d9d9d9]">Confirm Password</label>
                    <input id="password_confirmation" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password_confirmation" :value="old('password_confirmation')" required autofocus autocomplete="username" placeholder="Confirm Password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button type="submit" class="mt-4 inline-flex items-center px-4 py-3 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-800 focus:bg-gray-800 active:bg-white-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 hover:text-white focus:text-white justify-center">
                    {{ __('Update Password') }}
                </button>
            </form>
        </div>
    </div>            
</div>
@endsection