@extends('layouts.admin') @section('content')

<div class="md:mb-5">
   
<div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
    <input type="checkbox" class="w-6 h-6 md:h-7 md:w-7" />

    <div class="flex justify-between w-full">
        <h1 class="px-2 py-2 text-center text-white bg-red-600 rounded-lg">Delete All</h1>

        <h1 class="px-2 py-2 text-center text-white bg-blue-900 rounded-lg ">Add Customer  </h1>
    </div>
</div>


    
        {{-- End Dropdowns & Buttons Row --}}
    
        <div class="flex flex-col mx-2 border-2 md:mt-5 md:mx-10 ">
                <!-- Box 1: Customer List -->
                <div class="text-blue-900 ">
                    <div class="flex flex-row py-5 bg-gray-200">
                        <p class="w-[5%] px-2">#</p>
                        <p class="w-[10%]">User Id</p>
                        <p class="w-[15%]">Customer Name</p>
                        <p class="w-[10%]">City/Region</p>
                        <p class="w-[15%]">Address</p>
                        <p class="w-[10%]">Phone</p>
                        <p class="w-[10%]">Customer Type</p>
                        <p class="w-[10%]">Priority Level</p>
                        <p class="w-[15%]">Action</p>
                    </div>
                    <!-- Placeholder Content for Box 1 -->

                    {{-- Table list 1  --}}
                    <div class="flex flex-row py-5 text-gray-500 border-b-2 border-gray-300 ">

                        <div class="w-[5%] py-2 px-2">
                            <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
                        </div>

                        <p class="w-[10%]">#HN2580</p>

                        <div class="w-[15%]">
                        Hasindu Nimantha
                        </div>

                        <div class="w-[10%]">
                         Melbourne
                          </div>

                          <div class="w-[15%]">
                          NYC Sydney
                             </div>
                    

                        <div class="w-[10%]">
                    +123 456 789
                          </div>

                          <div class="w-[10%]">
                            Retail
                          </div>

                          <div class="w-[10%]">
                            after two weeks
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
                    <div class="flex flex-row py-5 text-gray-500 border-b-2 border-gray-300 ">

                        <div class="w-[5%] py-2 px-2">
                            <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
                        </div>

                        <p class="w-[10%]">#HN2580</p>

                        <div class="w-[15%]">
                        Hasindu Nimantha
                        </div>

                        <div class="w-[10%]">
                         Melbourne
                          </div>

                          <div class="w-[15%]">
                          NYC Sydney
                             </div>
                    

                        <div class="w-[10%]">
                    +123 456 789
                          </div>

                          <div class="w-[10%]">
                            WholeSale
                          </div>

                          <div class="w-[10%]">
                            after two weeks
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
    
          

            
        </div>
    </div>


</div>
@endsection
