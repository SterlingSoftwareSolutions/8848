@extends('layouts.admin') @section('content')

<div class="md:mb-5">
    {{-- 4 ICONS --}}
    <div class="flex flex-col md:flex-row mx-2 mt-10 gap-4 ">
        <div class="md:w-3/12 w-full border-2 border-blue-200 rounded-lg">
            <img
                class="border-green-500 mx-auto"
                src="{{ asset('images/customer.png') }}"
            />
            <p class="text-center text-blue-500 text-3xl">3,650</p>
            <p class="text-center text-blue-500 text-md">Customers</p>
        </div>

        <div class="md:w-3/12 w-full border-2 border-blue-200 rounded-lg">
            <img
                class="border-green-500 mx-auto"
                src="{{ asset('images/package.png') }}"
            />
            <p class="text-center text-blue-500 text-3xl">890</p>
            <p class="text-center text-blue-500 text-md">Products</p>
        </div>

        <div class="md:w-3/12 w-full border-2 border-blue-200 rounded-lg">
            <img
                class="border-green-500 mx-auto"
                src="{{ asset('images/delivery-truck.png') }}"
            />
            <p class="text-center text-blue-500 text-3xl">175</p>
            <p class="text-center text-blue-500 text-md">Orders</p>
        </div>

        <div class="md:w-3/12 w-full border-2 border-blue-200 rounded-lg">
            <img
                class="border-green-500 mx-auto"
                src="{{ asset('images/data-analytics.png') }}"
            />
            <p class="text-center text-blue-500 text-3xl">$ 125,520</p>
            <p class="text-center text-blue-500 text-md">Total Sales</p>
        </div>
    </div>

    {{-- END 4 ICONS ROw  --}}

    {{-- Name --}}
    <div class="md:mt-5 text-gray-500">
        <h1>New Customer</h1>
    </div>
    {{-- End Name --}}

    {{-- Dropdowns  & Buttons ROw --}}

    <div>
        <div class="flex flex-col md:flex-row mt-5 mx-2 md:mx-10 items-center ">
            <div class="md:w-6/12 flex flex-col md:flex-row gap-2 md:gap-0">
                <div class="md:w-1/12 w-2/12 md:py-2 py-0.5 px-2">
                    <input type="checkbox" class="h-6 w-6 md:h-7 md:w-7" />
                </div>
    
                <div class="md:w-3/12 w-full">
                    <select class="border-2 border-blue-300 rounded-lg py-2 px-2 w-full md:w-[80%]">
                        <option value="2weeks">Retail</option>
                        <option value="1month">After 1 month</option>
                    </select>
                </div>
    
                <div class="md:w-3/12 w-full">
                    <select class="border-2 border-blue-300 rounded-lg py-2 px-2 w-full md:w-[80%]">
                        <option value="2weeks">After 2 weeks</option>
                        <option value="1month">After 1 month</option>
                    </select>
                </div>
    
                <div class="md:w-1/12 w-2/12">
                    <img class="py-2 px-2 rounded-lg mx-auto bg-green-600" src="{{ asset('images/check.png') }}" alt="Check Icon" />
                </div>
    
                <div class="md:w-1/12 w-2/12">
                    <img class="py-2 px-2 rounded-lg mx-auto bg-red-600" src="{{ asset('images/cancel.png') }}" alt="Cancel Icon" />
                </div>
            </div>
        </div>
    
        {{-- End Dropdowns & Buttons Row --}}
    
        <div class="md:mt-5 flex flex-col mx-2 md:mx-10">
            <div class="md:flex flex-row space-x-4">
                <!-- Box 1: Customer List -->
                <div class=" text-blue-700 md:w-6/12">
                    <div class="flex flex-row bg-gray-200 py-5">
                        <p class="w-[10%] px-2">#</p>
                        <p class="w-[25%]">Customer Name</p>
                        <p class="w-[25%]">Customer Type</p>
                        <p class="w-[25%]">Priority Level</p>
                        <p class="w-[15%]">Action</p>
                    </div>
                    <!-- Placeholder Content for Box 1 -->

                    {{-- Table list 1  --}}
                    <div class="flex flex-row py-5 border-b-2 border-gray-300">
                        <div class="w-[10%] py-2 px-2">
                            <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
                        </div>
                        <p class="w-[25%]">John Doe</p>
                        <div class="w-[25%]">
                            <select class="border-2 border-blue-300 rounded-lg py-2 px-2 w-full md:w-[80%]">
                                <option value="2weeks">Retail</option>
                                <option value="1month">After 1 month</option>
                            </select>
                        </div>
                        <div class="w-[25%]">
                            <select class="border-2 border-blue-300 rounded-lg py-2 px-2 w-full md:w-[80%]">
                                <option value="2weeks">After 2 weeks</option>
                                <option value="1month">After 1 month</option>
                            </select>
                        </div>
                        <div class="md:flex flex-row gap-1">
                            <div>
                                <img class="py-2 px-2 rounded-lg mx-auto bg-green-600" src="{{ asset('images/check.png') }}" />
                            </div>
                            <div>
                                <img class="py-2 px-2 rounded-lg mx-auto bg-red-600" src="{{ asset('images/cancel.png') }}" />
                            </div>
                        </div>
                    </div>
                    {{-- table list 2 --}}
                      {{-- Table list 1  --}}
                      <div class="flex flex-row py-5 border-b-2 border-gray-300">
                        <div class="w-[10%] py-2 px-2">
                            <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
                        </div>
                        <p class="w-[25%]">John Doe</p>
                        <div class="w-[25%]">
                            <select class="border-2 border-blue-300 rounded-lg py-2 px-2 w-full md:w-[80%]">
                                <option value="2weeks">Retail</option>
                                <option value="1month">After 1 month</option>
                            </select>
                        </div>
                        <div class="w-[25%]">
                            <select class="border-2 border-blue-300 rounded-lg py-2 px-2 w-full md:w-[80%]">
                                <option value="2weeks">After 2 weeks</option>
                                <option value="1month">After 1 month</option>
                            </select>
                        </div>
                        <div class="md:flex flex-row gap-1">
                            <div>
                                <img class="py-2 px-2 rounded-lg mx-auto bg-green-600" src="{{ asset('images/check.png') }}" />
                            </div>
                            <div>
                                <img class="py-2 px-2 rounded-lg mx-auto bg-red-600" src="{{ asset('images/cancel.png') }}" />
                            </div>
                        </div>
                    </div>
                    {{-- table list 2 --}}  {{-- Table list 1  --}}
                    <div class="flex flex-row py-5 border-b-2 border-gray-300">
                        <div class="w-[10%] py-2 px-2">
                            <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
                        </div>
                        <p class="w-[25%]">John Doe</p>
                        <div class="w-[25%]">
                            <select class="border-2 border-blue-300 rounded-lg py-2 px-2 w-full md:w-[80%]">
                                <option value="2weeks">Retail</option>
                                <option value="1month">After 1 month</option>
                            </select>
                        </div>
                        <div class="w-[25%]">
                            <select class="border-2 border-blue-300 rounded-lg py-2 px-2 w-full md:w-[80%]">
                                <option value="2weeks">After 2 weeks</option>
                                <option value="1month">After 1 month</option>
                            </select>
                        </div>
                        <div class="md:flex flex-row gap-1">
                            <div>
                                <img class="py-2 px-2 rounded-lg mx-auto bg-green-600" src="{{ asset('images/check.png') }}" />
                            </div>
                            <div>
                                <img class="py-2 px-2 rounded-lg mx-auto bg-red-600" src="{{ asset('images/cancel.png') }}" />
                            </div>
                        </div>
                    </div>
                    {{-- table list 2 --}}
                </div>
    
                <!-- Box 2: Customer Details -->
                <div class="text-blue-700 md:w-6/12 ">
                    <div>
                        <h1 class="text-gray-500 px-2 md:-mt-6">Previous Orders</h1>
                    </div>
    
                    <div class="flex flex-row bg-gray-200 py-5">
                        <p class="w-[30%] px-2">Customer Name</p>
                        <p class="w-[30%]">Date</p>
                        <p class="w-[15%]">Items</p>
                        <p class="w-[15%]">Total</p>
                        <p class="w-[10%]">Action</p>
                    </div>
                    <!-- Placeholder Content for Box 2 -->
                    <div class="flex flex-row py-5 border-b-2 border-gray-300">
                        <p class="w-[30%] px-2">Jane Smith</p>
                        <div class="w-[30%]">
                            <h1>May 10 2023</h1>
                        </div>
                        <div class="w-[15%]">
                            <h1>Items 5</h1>
                        </div>
                        <div class="w-[15%]">
                            <h1>$500</h1>
                        </div>
                        <div class="w-[10%]">
                            <img class="py-2 px-2 rounded-lg mx-auto bg-black" src="{{ asset('images/edit.png') }}" />
                        </div>
                    </div>
                    <!-- Placeholder Content for Box 2 -->
       <!-- Placeholder Content for Box 2 -->
       <div class="flex flex-row py-5 border-b-2 border-gray-300">
        <p class="w-[30%] px-2">Jane Smith</p>
        <div class="w-[30%]">
            <h1>May 10 2023</h1>
        </div>
        <div class="w-[15%]">
            <h1>Items 5</h1>
        </div>
        <div class="w-[15%]">
            <h1>$500</h1>
        </div>
        <div class="w-[10%]">
            <img class="py-2 px-2 rounded-lg mx-auto bg-black" src="{{ asset('images/edit.png') }}" />
        </div>
    </div>
    <!-- Placeholder Content for Box 2 -->
           <!-- Placeholder Content for Box 2 -->
           <div class="flex flex-row py-5 border-b-2 border-gray-300">
            <p class="w-[30%] px-2">Jane Smith</p>
            <div class="w-[30%]">
                <h1>May 10 2023</h1>
            </div>
            <div class="w-[15%]">
                <h1>Items 5</h1>
            </div>
            <div class="w-[15%]">
                <h1>$500</h1>
            </div>
            <div class="w-[10%]">
                <img class="py-2 px-2 rounded-lg mx-auto bg-black" src="{{ asset('images/edit.png') }}" />
            </div>
        </div>
        <!-- Placeholder Content for Box 2 -->
                </div>
            </div>
        </div>
    </div>
    
          

            
        </div>
    </div>


</div>
@endsection
