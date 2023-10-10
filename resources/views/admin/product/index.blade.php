@extends('layouts.admin') @section('content')

<div class="md:mb-5">

    <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">

        <div class="w-10 md:py-2 py-0.5 px-2">
            <input type="checkbox" class="w-6 h-6 md:h-7 md:w-7" />
        </div>
    
    
        <div class="w-1/12">
            <h1 class="px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete All</h1>
        </div>
    
        <div class="w-10/12">
           
        </div>
    
        <div class="flex justify-end w-2/12">
            <h1 class="px-2 py-2 mx-auto text-center text-white bg-blue-900 rounded-lg ">Add Product </h1>
        </div>
    </div>
    



    <div class="flex flex-col mx-2 border-2 md:mt-5 md:mx-10 ">
        <!-- Box 1: Customer List -->
        <div class="text-blue-900 ">
            <div class="flex flex-row py-5 bg-gray-200">
                <p class="w-[5%] px-2">#</p>
                <p class="w-[10%]"></p>
                <p class="w-[20%]">Product Name</p>
                <p class="w-[10%]">Category</p>
                <p class="w-[10%]">Sub Category</p>
                <p class="w-[10%]">QTY</p>
                <p class="w-[10%]">Stock</p>
                <p class="w-[10%]">Price</p>
                <p class="w-[15%]">Action</p>
            </div>
            <!-- Placeholder Content for Box 1 -->

            {{-- Table list 1  --}}
            <div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

                <div class="w-[5%] py-2 px-2">
                    <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
                </div>

                <div class="w-[10%]">
                    <img src="{{ asset('images/Rectangle 236.png') }}" alt="Image Description" class="w-full">
                </div>
            

                <div class="w-[20%] ">
                Bamboo food Container
                </div>

                <div class="w-[10%]">
                Sugarcane
                  </div>

                  <div class="w-[10%]">
                    Sugarcane
                     </div>
            

                <div class="w-[10%]">
                250
                  </div>

                  <div class="w-[10%]">
                    <label class="px-2 py-2 mx-auto text-center text-green-600 bg-green-200 rounded-lg"><span class="ml-4 mr-4">In stock</span></label>
                  </div>

                  <div class="w-[10%]">
                    Aud 25.6
                  </div>

                <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">
                   
                  
                    <div class="w-40">
                        <h1 class="px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </h1>
                    </div>
                    <div class="w-40">
                        <h1 class="px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</h1>
                    </div>
                </div>
            </div>
            {{-- table list 2 --}}

        
            {{-- Table list 1  --}}
            <div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">


                <div class="w-[5%] py-2 px-2">
                    <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
                </div>

                <div class="w-[10%]">
                    <img src="{{ asset('images/Rectangle 236.png') }}" alt="Image Description" class="w-full">
                </div>
            

                <div class="w-[20%] ">
                Bamboo food Container
                </div>

                <div class="w-[10%]">
                Sugarcane
                  </div>

                  <div class="w-[10%]">
                    Sugarcane
                     </div>
            

                <div class="w-[10%]">
                0
                  </div>

                  <div class="w-[10%]">
                    <label class="px-2 py-2 mx-auto text-center text-red-600 bg-red-200 rounded-lg"><span class="">Out of Stock</span></label>
                  </div>

                  <div class="w-[10%]">
                    Aud 25.6
                  </div>

                <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">
                   
                  
                    <div class="w-40">
                        <h1 class="px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </h1>
                    </div>
                    <div class="w-40">
                        <h1 class="px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</h1>
                    </div>
                </div>
            </div>
            {{-- table list 2 --}}


        </div>

       

    </div>
</div>
</div>
@endsection
