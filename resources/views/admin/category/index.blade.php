@extends('layouts.admin') @section('content')

<div class="md:mb-5">

    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
            <input type="checkbox" class="h-6 w-6 md:h-7 md:w-7" />

            <div class="flex justify-between w-full">
                <h1 class="py-2 px-2 rounded-lg bg-red-600 text-white text-center">Delete All</h1>

                <h1 class="py-2 px-2 rounded-lg bg-blue-900 text-white text-center ">Add Product </h1>
            </div>
    </div>


    <div class="flex flex-col mx-2 border-2 md:mt-5 md:mx-10 ">
        <!-- Box 1: Customer List -->
        <div class="text-blue-900 ">
            <div class="flex flex-row py-5 bg-gray-200">
                <p class="w-[5%] px-2">#</p>
                <p class="w-[20%]"></p>
                <p class="w-[20%]">Category Name</p>
                <p class="w-[20%]">Sub Category</p>
                <p class="w-[20%]">Items</p>
                <p class="w-[15%]">Action</p>
            </div>
            <!-- Placeholder Content for Box 1 -->

            {{-- Table list 1  --}}
            <div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

                <div class="w-[5%] p-2">
                    <input type="checkbox" class="w-4 h-4 md:h-5 md:w-5" />
                </div>

                <div class="w-[20%]">
                    <img src="{{ asset('images/Rectangle 236.png') }}" alt="Image Description" class="w-full">
                </div>
            

                <div class="w-[20%] ">
                    Sugarcane
                </div>

                <div class="w-[20%]">
                    4 Sub Categories
                  </div>

                  <div class="w-[20%]">
                    155 Items
                     </div>
            

                <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">
                   
                  
                    <div class="w-[95px]">
                        <button class="w-full px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </button>
                    </div>
                    <div class="w-[95px]">
                        <button class="w-full px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</button>
                    </div>
                </div>
            </div>
            {{-- table list 2 --}}

        
             {{-- Table list 1  --}}
             <div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

                <div class="w-[5%] py-2 px-2">
                    <input type="checkbox" class="w-4 h-4 md:h-5 md:w-5" />
                </div>

                <div class="w-[20%]">
                    <img src="{{ asset('images/Rectangle 236.png') }}" alt="Image Description" class="w-full">
                </div>
            

                <div class="w-[20%] ">
                    Sugarcane
                </div>

                <div class="w-[20%]">
              4 Sub Categories
                  </div>

                  <div class="w-[20%]">
                    155 Items
                     </div>
            

                <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">
                   
                  
                    <div class="w-[95px]">
                        <button class="w-full px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </button>
                    </div>
                    <div class="w-[95px]">
                        <button class="w-full px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</button>
                    </div>
                </div>
            </div>
            {{-- table list 2 --}}

        </div>

       

    </div>
</div>
</div>
@endsection
