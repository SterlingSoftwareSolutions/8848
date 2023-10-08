@extends('layouts.admin') @section('content')
    <div class="container mx-auto p-6 ">
        <div class="md:mb-5">
            <h1 class="text-blue-700 font-medium truncate">Add Customer</h1>
        </div>
        <!-- Row 1 -->
        <div class="flex mb-4 gap-5">
            <div class="w-1/2 pr-4">
                <label for="first_name">First Name</label>
            </div>
            <div class="w-1/2">
                <label for="last_name">Last Name</label>
            </div>
        </div>
        <div class="flex mb-4 gap-5">
            <div class="w-1/2 pr-4">
                <input type="text" id="first_name" class="w-full border p-2">
            </div>
            <div class="w-1/2">
                <input type="text" id="last_name" class="w-full border p-2">
            </div>
        </div>

        <!-- Row 2 -->
        <div class="flex mb-3 gap-5">
            <div class="w-1/2 pr-4">
                <label for="company">Company Name (optional)</label>
            </div>
            <div class="w-1/2">
                <label for="city_region">City/Region</label>
            </div>
        </div>
        <div class="flex mb-3 gap-5 gap-5">
            <div class="w-1/2 pr-4">
                <input type="text" id="company" class="w-full border p-2">
            </div>
            <div class="w-1/2">
                <input type="text" id="city_region" class="w-full border p-2">
            </div>
        </div>

        <!-- Row 3 -->
        <div class="flex mb-3 gap-5">
            <div class="w-1/2 pr-4">
                <label for="street">Street Address</label>
            </div>
            <div class="w-1/2">
                <label for="state">State</label>
            </div>
        </div>
        <div class="flex mb-3 gap-5">
            <div class="w-1/2 pr-4">
                <input type="text" id="street" class="w-full border p-2">
            </div>
            <div class="w-1/2">
                <input type="text" id="state" class="w-full border p-2">
            </div>
        </div>

        <!-- Row 4 -->
        <div class="flex mb-3 gap-5">
            <div class="w-1/2 pr-4">
                <label for="phone">Phone</label>
            </div>
            <div class="w-1/2">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="flex mb-3 gap-5">
            <div class="w-1/2 pr-4">
                <input type="text" id="phone" class="w-full border p-2">
            </div>
            <div class="w-1/2">
                <input type="text" id="email" class="w-full border p-2">
            </div>
        </div>

        <!-- Row 5 -->
        <div class="flex mb-3 gap-5">
            <div class="w-1/2">
                <label for="customer_type">Customer Type</label>
            </div>
            <div class="w-1/2">
                <label for="priority_level">Priority Level</label>
            </div>
        </div>
        <div class="flex mb-3">
            <div class="w-1/2 pr-5">
                <select id="customer_type" class="w-full border p-2">
                    <option value="wholesale">Wholesale Customer</option>
                    <option value="retail">Retail Customer</option>
                </select>
            </div>
            <div class="w-1/2 pl-2">
                <select id="priority_level" class="w-full border p-2">
                    <option value="high">High Priority</option>
                    <option value="medium">Medium Priority</option>
                    <option value="low">Low Priority</option>
                </select>
            </div>
        </div>

        <div class="mt-6">
            <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-8 rounded mr-2">Save</button>
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-8 rounded">Cancel</button>
        </div>

    </div>
    <!-- Save and Cancel Buttons -->
@endsection
