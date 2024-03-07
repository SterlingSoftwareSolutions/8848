@extends('layouts.admin') @section('content')

<div class="md:mb-5">
    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        <div class="flex justify-between w-full md:mt-5">

            <form class="flex gap-4 items-center">
                <input name="search" type="text" class="px-4 bg-white rounded h-12 border border-blue-900" placeholder="Search ..." value="{{$_GET['search'] ?? null}}">

                <button type="submit" class="p-4 text-white rounded bg-blue-900">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                <select name="role"class="px-4 bg-white rounded h-12 border border-blue-900" onchange="this.form.submit()">
                    <option value="">Any Type</option>
                    <option value="client_wholesale" @if(($_GET['role'] ?? null) == 'client_wholesale') selected @endif>Wholesale</option>
                    <option value="client_retail" @if(($_GET['role'] ?? null) == 'client_retail') selected @endif>Retail</option>
                </select>

                <select name="priority"class="px-4 bg-white rounded h-12 border border-blue-900" onchange="this.form.submit()">
                    <option value="">Any Priority</option>
                    <option value="high"  @if(($_GET['priority'] ?? null) == 'high') selected @endif>High</option>
                    <option value="medium" @if(($_GET['priority'] ?? null) == 'medium') selected @endif>Medium</option>
                    <option value="low" @if(($_GET['priority'] ?? null) == 'low') selected @endif>Low</option>
                </select>
            </form>

            <a href="/admin/users/create">
                <div class="text-center text-white bg-blue-900 rounded py-2.5 h-12 w-40">Add Customer</div>
            </a>
        </div>
    </div>

    {{-- End Dropdowns & Buttons Row --}}
    <div class="flex flex-col mx-2 border-2 md:mt-5 md:mx-10 ">
        <!-- Box 1: Customer List -->
        <div class="text-blue-900 ">
            <div class="flex flex-row py-5 bg-gray-200">
                <p class="w-[20%] pl-5">Customer Name</p>
                <p class="w-[15%]">City/Region</p>
                <p class="w-[15%]">Address</p>
                <p class="w-[10%]">Phone</p>
                <p class="w-[10%]">Customer Type</p>
                <p class="w-[10%]">Priority Level</p>
                <p class="w-[20%] flex justify-center">Action</p>
            </div>
            <!-- Placeholder Content for Box 1 -->
            @foreach($users as $user)
            <x-user-row :user="$user" />
            @endforeach
            <div class="flex justify-center p-5">
                {{$users->appends($_GET)->links()}}
            </div>
        </div>
    </div>
</div>
@endsection