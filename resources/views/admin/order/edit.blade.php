@extends('layouts.admin') @section('content')



<div class="md:mb-5">

 <div class="border-2 py-5 px-5 md:mt-5 mx-2">
    <div class="flex flex-row justify-between mx-10">
        <p class="">Order Details (Status, Payment, Etc )</p>
        <p class="">12/12/2023</p>
    </div>
 </div>

{{-- Cutomer Details --}}
 <div class="border-2 py-5 px-5 md:mt-5 mx-2">
    <p class="text-center font-bold">Customer Details</p>

    <div class="flex flex-row justify-around md:mt-5">
        <p>John Cart</p>
        <p>+91384833838</p>
        <p>john@gmail.com</p>
    </div>
 </div>
 {{-- Customer Detais End --}}

        {{-- TABLE Start --}}

        <div class="flex flex-col mx-2  md:mt-5 ">
    
            <!-- Box 1: Customer List -->
            <div class="text-blue-900 ">
                <div class="flex flex-row py-5 bg-gray-200">
                    <p class="w-[20%] mx-5">Product Name</p>
                    <p class="w-[20%]"></p>
                    <p class="w-[15%]">Price</p>
                    <p class="w-[15%]">Discount Price</p>
                    <p class="w-[15%]">Quantity</p>
                    <p class="w-[15%]">Subtotal</p>
                </div>
                <!-- Placeholder Content for Box 1 -->
    
                {{-- Table list 1  --}}
                <div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

                    <div class="w-[20%] px-2 mx-5">
                        <img src="{{ asset('images/Rectangle 236.png') }}" alt="Image Description" >
                    </div>
                
                    <div class="w-[20%] ">
                        The Berrle Box
                    </div>
                
                    <div class="w-[15%]">
                        $12.34
                    </div>
                
                    <div class="w-[15%]">
                        $12.34

                    </div>
                
                     
                      <div class="w-[15%]">
                        x5
                      </div>
                
                      <div class="w-[15%]">
                        $61.7
                      </div>
                 
                </div>
                {{-- Table list 1  --}}



                 {{-- Table list 1  --}}
                 <div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

                    <div class="w-[20%] px-2 mx-5">
                        <img src="{{ asset('images/Rectangle 236.png') }}" alt="Image Description" >
                    </div>
                
                    <div class="w-[20%] ">
                        The Berrle Box
                    </div>
                
                    <div class="w-[15%]">
                        $12.34
                    </div>
                
                    <div class="w-[15%]">
                        $12.34

                    </div>
                
                     
                      <div class="w-[15%]">
                        x5
                      </div>
                
                      <div class="w-[15%]">
                        $61.7
                      </div>
                 
                </div>
                {{-- Table list 1  --}}
              
            </div>
        </div>

        {{-- TABLE END --}}

        <div class="border-2 py-5 px-5 md:mt-5 mx-2">
            <p class="text-center font-bold">Payment Details</p>

            <div class="flex flex-row justify-between md:mt-5">
          <p> Payment ID</p> 
          <p> Payment Date</p> 
          <p> Payment Method</p> 
          <p> Card Number</p> 
          <p> Amount</p> 
          <p> Balance</p> 
          <p> Status</p> 
        </div>
     
         </div>

         <div class=" flex flex-row  w-full md:mt-5">

             <div class="w-6/12 border-2 mx-2">
                <p class="text-center font-bold md:mt-5">Billing Details</p>

<div class="px-5 py-5">
    <p>John Cart</p>
    <p>500/A </p>
    <p>Lane</p>
    <p>DownSouth</p>
    <p>Melbourne</p>
    <p>Australia</p>

</div>
              

             </div>

             <div class="w-6/12 border-2 mx-2">
                <p class="text-center font-bold md:mt-5">Shipping Address</p>


                <div class="px-5 py-5">
                    <p>John Cart</p>
                    <p>500/A </p>
                    <p>Lane</p>
                    <p>DownSouth</p>
                    <p>Melbourne</p>
                    <p>Australia</p>
                    <p>ZIP 11500</p>
                
                </div>
             </div>

         </div>

           <div class="flex justify-end mx-auto md:mt-5">
            <button class="border-2 border-green-700 bg-green-800 text-white py-2 px-5 rounded-lg w-40 mx-2">Save</button>
           </div>

       

</div>


      

        








@endsection
