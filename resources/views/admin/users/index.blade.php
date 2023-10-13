@extends('layouts.admin') @section('content')

<div class="md:mb-5">

    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
        <div class="flex justify-between w-full">
            <a href="/admin/users/create">
                <h1 class="px-2 py-2 text-center text-white bg-blue-900 rounded-lg ">Add Customer </h1>
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
                <p class="w-[20%]">Action</p>
            </div>
            <!-- Placeholder Content for Box 1 -->
            @foreach($users as $user)
            <x-user-row :user="$user" />
            @endforeach
            <div class="flex justify-center p-5">
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>




</div>
</div>


</div>
@endsection