@extends('layouts.admin') @section('content')

<div class="md:mb-5">

    <div class="flex flex-col md:flex-row mt-5 mx-2 md:mx-10 items-center gap-2 ">

        <div class="w-10 md:py-2 py-0.5 px-2">
            <input type="checkbox" class="h-6 w-6 md:h-7 md:w-7" />
        </div>
    
    
        <div class="w-1/12">
            <h1 class="py-2 px-2 rounded-lg mx-auto bg-red-600 text-white text-center">Delete All</h1>
        </div>
    
        <div class="w-10/12">
           
        </div>
    
        <div class="w-1/12 flex justify-end">
            <h1 class="py-2 px-2 rounded-lg mx-auto bg-blue-900 text-white text-center ">Add Product </h1>
        </div>
    </div>
    



    <div class="md:mt-5 flex flex-col mx-2 md:mx-10 border-2 ">
        <!-- Box 1: Customer List -->
        <div class=" text-blue-900 ">
            <div class="flex flex-row bg-gray-200 py-5">
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
            <div class="flex flex-row py-5 text-gray-500 items-center border-b-2 border-gray-300">

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
                    <label class="py-2 px-2 rounded-lg mx-auto bg-green-200 text-green-600 text-center"><span class="ml-4 mr-4">In stock</span></label>
                  </div>

                  <div class="w-[10%]">
                    Aud 25.6
                  </div>

                <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">
                   
                  
                    <div class="w-40">
                        <h1 class="py-2 px-2 rounded-lg mx-auto bg-black text-white text-center">Edit </h1>
                    </div>
                    <div class="w-40">
                        <h1 class="py-2 px-2 rounded-lg mx-auto bg-red-600 text-white text-center">Delete</h1>
                    </div>
                </div>
            </div>
            {{-- table list 2 --}}

        
            {{-- Table list 1  --}}
            <div class="flex flex-row py-5 text-gray-500 items-center border-b-2 border-gray-300">


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
                    <label class="py-2 px-2 rounded-lg mx-auto bg-red-200 text-red-600 text-center"><span class="">Out of Stock</span></label>
                  </div>

                  <div class="w-[10%]">
                    Aud 25.6
                  </div>

                <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">
                   
                  
                    <div class="w-40">
                        <h1 class="py-2 px-2 rounded-lg mx-auto bg-black text-white text-center">Edit </h1>
                    </div>
                    <div class="w-40">
                        <h1 class="py-2 px-2 rounded-lg mx-auto bg-red-600 text-white text-center">Delete</h1>
                    </div>
                </div>
            </div>
            {{-- table list 2 --}}


        </div>

       

    </div>
</div>
</div>
@endsection
