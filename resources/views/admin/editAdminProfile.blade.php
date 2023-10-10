<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- HEADER -->
    @include('layouts.admin.header')

    <div class="flex">
        <!-- SIDEBAR -->
        <div class="w-[300px]">
            @include('layouts.admin.sidebar')
        </div>

        <div class="w-full p-8">
            <div class="w-full mt-4 border rounded">
                <div class="py-5">
                    <h1 class="flex items-center justify-center ml-4 font-bold text-left text-black text-md">Edit Admin Details</h1>
                </div>
                
                <div>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        <div class="flex items-center justify-center">
                            <img src="{{ URL('images/logo.png')}}" alt="Logo" class="w-16 h-16 border border-gray-400 rounded-full">
                        </div>
                        
                        <div class="flex w-full mx-auto mt-6">
                            {{-- f name --}}
                            <div class="mb-2" style="width: 50%;">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                    First name
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="company_name"
                                    type="text"
                                    placeholder="First Name"
                                />
                            </div>
                        
                            {{-- l name --}}
                            <div class="mb-2 ml-8" style="width: 50%;">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                    Last name
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="company_name"
                                    type="text"
                                    placeholder="Last Name"
                                />
                            </div>
                        </div>
    
                        <div class="flex w-full mx-auto">
                            {{-- d name --}}
                            <div class="mb-2" style="width: 50%;">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                    Display name
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="company_name"
                                    type="text"
                                    placeholder="Display name"
                                />
                            </div>
                        
                            {{-- email --}}
                            <div class="mb-2 ml-8" style="width: 50%;">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                    Email Address
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="company_name"
                                    type="email"
                                    placeholder="Email"
                                />
                            </div>
                        </div>
    
                        <div class="mt-4 font-semibold text-black">
                            Password change
                        </div>
    
                        <div class="flex w-full mx-auto mt-4">
                            {{-- current password --}}
                            <div class="relative mb-2" style="width: 50%;">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="current_password">
                                    Current password (leave blank to leave unchanged)
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="current_password"
                                    type="password"
                                    placeholder="Current password"
                                />
                                {{-- <div class="absolute top-0 right-0 mt-3 mr-3">
                                    <button
                                        class="bg-transparent border-none outline-none focus:outline-none"
                                        id="current_password_toggle"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            class="w-6 h-6"
                                            id="current_password_icon"
                                        >
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      
                                        </svg>
                                    </button>
                                </div> --}}
                            </div>
                        
                            {{-- New password --}}
                            <div class="mb-2 ml-8" style="width: 50%;">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                    New password (leave blank to leave unchanged)
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="company_name"
                                    type="password"
                                    placeholder="New password"
                                />
                            </div>
                        
                        </div>
                        <div class="flex w-full mx-auto">
                            {{-- Confirm new password --}}
                            <div class="mb-2" style="width: 48.5%;">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
                                    Confirm new password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="company_name"
                                    type="password"
                                    placeholder="Confirm new password"
                                />
                            </div>
                        </div>
                        
                        <button class="p-2 font-bold text-white bg-blue-500 rounded-md">
                            Save Changes
                        </button>
      
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- FOOTER -->
    <div class="mt-20">
        @include('layouts.admin.footer')
    </div>
    
</body>
</html>
