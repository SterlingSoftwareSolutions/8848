@extends('layouts.admin') @section('content')

<div class="md:mb-5">
   
<div class="flex flex-col md:flex-row mt-5 mx-2 md:mx-10 items-center gap-2 ">

    <div class="w-10 md:py-2 py-0.5 px-2">
        <input type="checkbox" class="h-6 w-6 md:h-7 md:w-7" />
    </div>

    <div class="w-1/12">
        <h1 class="py-2 px-2 rounded-lg mx-auto bg-green-600 text-white text-center">Approve All</h1>
    </div>

    <div class="w-1/12">
        <h1 class="py-2 px-2 rounded-lg mx-auto bg-red-600 text-white text-center">Close All</h1>
    </div>
    <div class="w-10/12">
       
    </div>

    <div class="w-1/12 flex justify-end">
        <h1 class="py-2 px-2 rounded-lg mx-auto bg-blue-900 text-white text-center ">New Order </h1>
    </div>  
</div>


    
        {{-- End Dropdowns & Buttons Row --}}
    
        <div class="md:mt-5 flex flex-col mx-2 md:mx-10 border-2 ">
                <!-- Box 1: Customer List -->
                <div class=" text-blue-900 ">
                    <div class="flex flex-row bg-gray-200 py-5">
                        <p class="w-[5%] px-2">#</p>
                        <p class="w-[10%]">Number</p>
                        <p class="w-[10%]">Date</p>
                        <p class="w-[15%]">Customer Name</p>
                        <p class="w-[10%]">Status</p>
                        <p class="w-[10%]">Items</p>
                        <p class="w-[10%]">Discount</p>
                        <p class="w-[10%]">Total</p>
                        <p class="w-[20%]">Action</p>
                    </div>
                    <!-- Placeholder Content for Box 1 -->

                    {{-- Table list 1  --}}
                    <div class="flex flex-row py-5   text-gray-500">

                        <div class="w-[5%] py-2 px-2">
                            <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
                        </div>

                        <p class="w-[10%]">#32010</p>

                        <div class="w-[10%]">
                         June 26 2023
                        </div>

                        <div class="w-[15%]">
                            Hasindu Nimantha
                          </div>

                          <div class="w-[10%]">
                            <label class="py-2 px-2 rounded-lg mx-auto bg-green-200 text-green-600 text-center"><span class="ml-4 mr-4">Paid</span></label>

                          </div>

                        <div class="w-[10%]">
                       3 items
                          </div>

                          <div class="w-[10%]">
                            10%
                          </div>

                          <div class="w-[10%]">
                            $200.00
                          </div>

                        <div class="md:flex flex-row gap-1 w-[20%] mx-1">
                            <div class="w-40">
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-green-600 text-white text-center">Approve </h1>
                            </div>
                            <div class="w-40">
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-red-600 text-white text-center">Cancel </h1>
                            </div>
                            <div class="w-40">
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-black text-white text-center">Edit </h1>
                            </div>
                        </div>
                    </div>
                    {{-- table list 2 --}}
                 

                      {{-- Table list 1  --}}
                      <div class="flex flex-row py-5 border-b-2 border-gray-300 text-gray-500">

                        <div class="w-[5%] py-2 px-2">
                            <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
                        </div>

                        <p class="w-[10%]">#32010</p>

                        <div class="w-[10%]">
                         June 26 2023
                        </div>

                        <div class="w-[15%]">
                            Hasindu Nimantha
                          </div>

                          <div class="w-[10%]">
                            <label class="py-2 px-2 rounded-lg mx-auto bg-red-200 text-red-600 text-center"><span class="ml-1 mr-1">Unpaid</span></label>

                        </div>

                        <div class="w-[10%]">
                       3 items
                          </div>

                          <div class="w-[10%]">
                            10%
                          </div>

                          <div class="w-[10%]">
                            $200.00
                          </div>

                        <div class="md:flex flex-row gap-1 w-[20%] mx-1">
                            <div class="w-40">
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-green-600 text-white text-center">Approve </h1>
                            </div>
                            <div class="w-40">
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-red-600 text-white text-center">Cancel </h1>
                            </div>
                            <div class="w-40">
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-black text-white text-center">Edit </h1>
                            </div>
                        </div>
                    </div>
                    {{-- table list 2 --}}

                      {{-- Table list 1  --}}
                      <div class="flex flex-row py-5 border-b-2 border-gray-300 text-gray-500">

                        <div class="w-[5%] py-2 px-2">
                            <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
                        </div>

                        <p class="w-[10%]">#32010</p>

                        <div class="w-[10%]">
                         June 26 2023
                        </div>

                        <div class="w-[15%]">
                            Hasindu Nimantha
                          </div>

                          <div class="w-[10%]">
                            <label class="py-2 px-2 rounded-lg mx-auto bg-yellow-200 text-yellow-600 text-center"><span class="ml-2 mr-2">Partial</span></label>
                        </div>

                        <div class="w-[10%]">
                       3 items
                          </div>

                          <div class="w-[10%]">
                            10%
                          </div>

                          <div class="w-[10%]">
                            $200.00
                          </div>

                        <div class="md:flex flex-row gap-1 w-[20%] mx-1">
                            <div class="w-40">
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-green-600 text-white text-center">Approve </h1>
                            </div>
                            <div class="w-40">
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-red-600 text-white text-center">Cancel </h1>
                            </div>
                            <div class="w-40">
                                <h1 class="py-2 px-2 rounded-lg mx-auto bg-black text-white text-center">Edit </h1>
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
