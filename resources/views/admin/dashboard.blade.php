@extends('layouts.admin')
@section('content')

<div>

<div class="flex flex-col md:flex-row  mx-auto mt-10 gap-4 ">
    <div class="md:w-3/12 w-full">
        <img
            class="border-green-500 mx-auto"
            src="{{ asset('images/customer.png') }}"
        />
        <p class="text-center text-blue-500 text-3xl">
       3,650
        </p>
        <p class="text-center text-blue-500 text-md">
          Customers
        </p>
    </div>

    <div class="md:w-3/12 w-full">
        <img
            class="border-green-500 mx-auto"
            src="{{ asset('images/package.png') }}"
        />
        <p class="text-center text-blue-500 text-3xl ">
            890
        </p>
        <p class="text-center text-blue-500 text-md">
            Products
          </p>
    </div>


    <div class="md:w-3/12 w-full">
        <img
            class="border-green-500 mx-auto"
            src="{{ asset('images/delivery-truck.png') }}"
        />
        <p class="text-center text-blue-500 text-3xl ">
           175
        </p>
        <p class="text-center text-blue-500 text-md">
            Orders
          </p>
    </div>

    
    <div class="md:w-3/12 w-full">
        <img
            class="border-green-500 mx-auto"
            src="{{ asset('images/data-analytics.png') }}"
        />
        <p class="text-center text-blue-500 text-3xl ">
          $ 125,520
        </p>
        <p class="text-center text-blue-500 text-md">
            Total Sales
          </p>
    </div>
    

  
</div>

{{-- END 4 ICONS ROw  --}}


{{-- Dropdowns  & Buttons ROw --}}

<div class="flex flex-row mt-5">
    <div class="w-1/12 py-2 px-2">
        <input type="checkbox" class="h-6 w-6" />
    </div>
    
    

    <div class="w-1/12">
        <select class="border-2 border-blue-300 rounded-lg py-2 px-2">
            <option value="Retail">Retail</option>
            <option value="Wholesale">Wholesale</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <div class="w-2/12">
        <select class="border-2 border-blue-300 rounded-lg py-2 px-2">
            <option value="2weeks">After 2 weeks</option>
            <option value="1month">After 1 month</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <div class="w-1/12">
        <p class="bg-green-600 text-white border-2 rounded-lg text-center px-5 py-2">Save All</p>
    </div>

    <div class="w-1/12">
        <p class="bg-red-700 text-white border-2 rounded-lg text-center px-5 py-2">Delete All</p>
    </div>

    <div class="w-6/12 mx-10 flex justify-end">
        <p class="bg-blue-500 w-3/12 text-white border-2 rounded-lg text-center px-5 py-2 ">Add Customer</p>
    </div>
</div>

{{-- End Dropdowns  & Buttons ROw --}}


 <div class="md:mt-5">


    <div class="flex flex-row bg-gray-200 py-5">
    <p class="w-[5%]">#</p>
    <p class="w-[10%]">User ID</p>
    <p class="w-[10%]">Customer Name</p>
    <p class="w-[10%]">City/Region</p>
    <p class="w-[10%]">Phone</p>
    <p class="w-[15%]">Customer Type</p>
    <p class="w-[20%]">Priority Level</p>
    <p class="w-[20%]">Action</p>
</div>
  

<div>
    <p class="w-1/12 py-2 px-2">
        <input type="checkbox" class="h-6 w-6" />
    </p>
</div>




 </div>


</div>
@endsection