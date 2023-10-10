@extends('layouts.admin') @section('content')
    <div class="container p-6 mx-auto ">
        <form>
        <div class="md:mb-5">
            <h1 class="text-lg font-bold">Add Customer</h1>
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
                    <input type="text" id="first_name" class="w-full p-2 border">
                </div>
                <div class="w-1/2">
                    <input type="text" id="last_name" class="w-full p-2 border">
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
                    <input type="text" id="phone" class="w-full p-2 border">
                </div>
                <div class="w-1/2">
                    <input type="text" id="email" class="w-full p-2 border">
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
                    <input type="text" id="street" class="w-full p-2 border">
                </div>
                <div class="w-1/2">
                    <input type="text" id="state" class="w-full p-2 border">
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
                    <select id="customer_type" class="w-full p-2 border">
                        <option value="wholesale">Wholesale Customer</option>
                        <option value="retail">Retail Customer</option>
                    </select>
                </div>
                <div class="w-1/2 pl-2">
                    <select id="priority_level" class="w-full p-2 border">
                        <option value="high">High Priority</option>
                        <option value="medium">Medium Priority</option>
                        <option value="low">Low Priority</option>
                    </select>
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
                                    <input class="w-full px-3 py-2 mr-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="" id="" placeholder="First name" />
                                </div>
                                <div class="md:ml-2" style="width: 50%">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700" for="lastname">
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
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="company_name"
                                    type="text"
                                    placeholder="Company Name"
                                />
                            </div>
                            
                            {{-- state --}}
                            <div class="mb-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_region">
                                    State
                                </label>
                                <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="country" id="country">
                                    <option class="text-sm" value="">California</option>
                                </select>
                            </div>
    
                            {{-- street Address --}}
                            <div class="mb-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="street-address">
                                    Street address
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-1 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id=""
                                    type="text"
                                    placeholder="House number and street name"
                                />
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id=""
                                    type="text"
                                    placeholder="Apartment, suite, unit, etc. (optional)"
                                />
                            </div>
    
                            {{-- town/city --}}
                            <div class="mb-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="towm-city">
                                    Town/City
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id=""
                                    type="text"
                                    placeholder="Town/City"
                                />
                            </div>
    
    
                            {{-- zip-code --}}
                            <div class="mb-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="zip_code">
                                    ZIP Code
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id=""
                                    type="text"
                                    placeholder="Zip Code"
                                />
                            </div>
    
                            {{-- phone --}}
                            <div class="mb-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="number">
                                    Phone
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id=""
                                    type="number"
                                    placeholder="Phone"
                                />
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
                        <div class="px-8 pb-8 mb-4 bg-white rounded" id="shipping-form">
                            {{-- name --}}
                            <div class="flex flex-row mb-4">
                                <div class="mb-4 md:mr-2 md:mb-0" style="width: 50%">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700" for="firstname">
                                        First Name
                                    </label>
                                    <input class="w-full px-3 py-2 mr-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="" id="" placeholder="First name" />
                                </div>
                                <div class="md:ml-2" style="width: 50%">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700" for="lastname">
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
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="company_name"
                                    type="text"
                                    placeholder="Company Name"
                                />
                            </div>
                            
                            {{-- state --}}
                            <div class="mb-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_region">
                                    State
                                </label>
                                <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="country" id="country">
                                    <option class="text-sm" value="">California</option>
                                </select>
                            </div>
    
                            {{-- street Address --}}
                            <div class="mb-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="street-address">
                                    Street address
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-1 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id=""
                                    type="text"
                                    placeholder="House number and street name"
                                />
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id=""
                                    type="text"
                                    placeholder="Apartment, suite, unit, etc. (optional)"
                                />
                            </div>
    
                            {{-- town/city --}}
                            <div class="mb-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="towm-city">
                                    Town/City
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id=""
                                    type="text"
                                    placeholder="Town/City"
                                />
                            </div>
    
                            {{-- zip-code --}}
                            <div class="mb-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="zip_code">
                                    ZIP Code
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id=""
                                    type="text"
                                    placeholder="Zip Code"
                                />
                            </div>
    
                            {{-- phone --}}
                            <div class="mb-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700" for="number">
                                    Phone
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id=""
                                    type="number"
                                    placeholder="Phone"
                                />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <button class="px-8 py-2 mr-2 font-bold text-white bg-green-600 rounded hover:bg-green-700">Save</button>
                                <button class="px-8 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-600">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
