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
        <h1 class="py-2 px-2 rounded-lg mx-auto bg-blue-900 text-white text-center ">Add Customer </h1>
    </div>
</div>


    
        {{-- End Dropdowns & Buttons Row --}}
    
        <div class="md:mt-5 flex flex-col mx-2 md:mx-10 border-2 ">
                <!-- Box 1: Customer List -->
                <div class=" text-blue-900 ">
                    <div class="flex flex-row bg-gray-200 py-5">
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
                    <div class="flex flex-row py-5 border-b-2 border-gray-300 text-gray-500 ">

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
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-black text-white text-center">Edit </h1>
                            </div>
                            <div class="w-40">
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-red-600 text-white text-center">Delete</h1>
                            </div>
                        </div>
                    </div>
                    {{-- table list 2 --}}

                
                    {{-- Table list 1  --}}
                    <div class="flex flex-row py-5 border-b-2 border-gray-300 text-gray-500 ">

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
    
          

            
        </div>
    </div>


</div>
@endsection
