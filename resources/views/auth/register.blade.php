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
    </head>
    <body class="font-sans antialiased text-gray-900">
        <!-- HEADER -->
        @include('layouts.app.header')
        
        <div class="flex flex-col items-center min-h-screen pt-5 bg-gray-100 sm:justify-center sm:pt-0" style="background-image: url('images/background.jpg'); background-size: 100% 100%;">

            <div class="w-full px-8 py-4 overflow-hidden shadow-md bg-gradient-to-b from-[#166EB6] to-[#284297] sm:max-w-md sm:rounded-lg relative">
                {{-- bg image overlay --}}
                <div class="absolute inset-0 bg-blue-700 bg-opacity-50" style="background-image: url('images/image.jpg'); opacity: 0.1;"></div>
                
                <div class="relative w-full px-8 py-4 overflow-hidden bg-none sm:max-w-md sm:rounded-lg">
                    <div class="flex justify-center mt-3 mb-5 text-2xl font-bold">
                        <h1><a href="{{ route('login') }}" class="text-white hover:text-blue-300">Login</a></h1>
                        <h1 class="ml-3"><a href="{{ route('register') }}" class="text-white hover:text-blue-300">Register</a></h1>
                    </div>
                
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
    
                    <form method="POST">
                        @csrf
                        
                        <!-- Name -->
                        <div>
                            <label for="name" :value="__('Name')" class="block text-sm font-medium text-[#d9d9d9]">Name</label>
                            <input id="name" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        
                        <!-- Email Address -->
                        <div class="mt-4">
                            <label for="email" :value="__('Email')" class="block text-sm font-medium text-[#d9d9d9]">Email</label>
                            <input id="email" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
    
                        <!-- Password -->
                        <div class="mt-4">
                            <label for="password" :value="__('Password')" class="block text-sm font-medium text-[#d9d9d9]">Password</label>
    
                            <input id="password" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password"
                                            placeholder="Password" />
    
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        
                        <!-- Password -->
                        <div class="mt-4">
                            <label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-[#d9d9d9]">Confirm Password</label>
    
                            <input id="password_confirmation" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            type="password_confirmation"
                                            name="password_confirmation"
                                            required autocomplete="current-password_confirmation"
                                            placeholder="Confirm Password" />
    
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="text-sm text-[#d9d9d9] underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>

                        <button type="submit" class="mt-4 md:mx-[110px] mx-[80px] inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-400 active:bg-white-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 hover:text-white">
                            {{ __('Register') }}
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
    {{--end footer --}}
</html>
