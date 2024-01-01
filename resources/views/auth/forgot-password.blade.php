<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .active {
                color: black;
            }
        </style>
    </head>
    
    <body class="font-sans antialiased text-gray-900">
        <!-- HEADER -->
        @include('layouts.app.header')
        
        <div class="flex flex-col items-center min-h-screen pt-5 bg-gray-100 sm:justify-center sm:pt-0" style="background-image: url('/images/background.jpg'); background-size: 100% 100%;">

            <div class="w-full px-8 py-4 overflow-hidden shadow-md bg-gradient-to-b from-[#166EB6] to-[#284297] sm:max-w-md sm:rounded-lg relative">
                {{-- bg image overlay --}}
                <div class="absolute inset-0 bg-blue-700 bg-opacity-50" style="background-image: url('/images/image.jpg'); opacity: 0.1;"></div>
                
                <div class="relative w-full px-8 py-4 overflow-hidden bg-none sm:max-w-md sm:rounded-lg">
                <div class="flex justify-center mt-3 mb-5 text-2xl font-bold">
                    <h1>
                        <a href="{{ route('login') }}" class="text-white' }}">
                            Forgot Password
                        </a>
                    </h1>
                </div>
                <p class="text-[12px] text-gray-200">Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
    
                    <form method="POST" class="mt-4">
                        @csrf
    
                        <!-- Email Address -->
                        <div>
                            <label for="email" :value="__('Email')" class="block text-sm font-medium text-[#d9d9d9]">Email</label>
                            <input id="email" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        
                        <button type="submit" class="mt-4 mx-[80px] inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-400 active:bg-white-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 hover:text-white md:w-5/12 justify-center">
                            {{ __('Submit') }}
                        </button>
                    </form>
                </div>
                
            </div>            
        </div>
    </body>
    {{-- footer --}}
    <div class="-mt-8">
        @include('layouts.app.footer')
    </div>
    {{-- end footer --}}
</html>
