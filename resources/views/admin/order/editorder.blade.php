@extends('layouts.admin') @section('content')

<div class="w-full gap-3 mt-5 ml-4 md:flex">
    <div class="flex flex-col w-full md:w-7/12">
        <div class="w-full mt-4 rounded">
            <div class="py-5">
                <h1 class="ml-4 font-bold text-left text-black text-md">Edit Order</h1>
            </div>
            <div class="mt-2">
                <form class="px-8 pb-8 mb-4 bg-white rounded">
                    {{-- Customer Name --}}
                    <div class="mb-2">
                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="name">
                            Customer Name :
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="Customer_Name"
                            type="text"
                            placeholder="Enter Your Name"
                        />
                    </div>

                    {{-- Order Date --}}
                    <div class="mb-2">
                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="Order_Date">
                            Order Date :
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id=""
                            type="text"
                            placeholder="DD/MM/YYYY"
                        />
                    </div>

                    {{-- Billing Address --}}
                    <div class="mb-2">
                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="Billing_Address">
                            Billing Address :
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id=""
                            type="text"
                            placeholder="Enter Billing Address"
                        />
                    </div>

                    {{-- Paid Status --}}
                    <div class="mb-2">
                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="paid_status">
                            Paid Status :
                        </label>
                        <div class="relative">
                            <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="country" id="country">
                                <option class="text-sm" value="">Yes</option>
                                <option class="text-sm" value="">No</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                  </svg>                                  
                            </div>
                        </div>
                        
                    </div>

                    {{-- Order Status --}}
                    <div class="mb-2">
                        <label class="block mb-2 text-sm font-semibold text-gray-700" for="order_status">
                            Order Status:
                        </label>
                        <div class="relative">
                            <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="country" id="country">
                                <option class="text-sm" value="">Shipped</option>
                                <option class="text-sm" value="">Returned</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                  </svg>                                  
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between space-x-2">
                        <button class="flex-1 p-2 bg-green-500 rounded-md">
                            Approve
                        </button>
                        <button class="flex-1 p-2 bg-red-500 rounded-md">
                            Cancel
                        </button>
                        <button class="flex-1 p-2 bg-blue-500 rounded-md">
                            Print
                        </button>
                    </div>                    
                </form>
            </div>
        </div>
    </div>


    <div class="flex flex-col w-full mt-10">
        {{-- order box --}}
        <div class="w-full mt-4 mb-6 border rounded md:w-11/12 md:mt-0">
            <div class="mt-2">
                <table class="w-full mt-5">
                    <tr class="ml-2 font-semibold text-blue-500 bg-gray-200">
                        <td class="py-5">#</td>
                        <td>Product Name</td>
                        <td>QTY</td>
                        <td>Price</td>
                        <td>Discount</td>
                        <td>Total</td>
                    </tr>
                    
                    <tr class="border-b-2">
                        <td>HN215</td>
                        <td class="flex items-center">
                            <img src="{{ URL('images/product-ex.png')}}" alt="" class="w-10 h-10 mr-2 border rounded">
                            8848 Test Product 01
                        </td>                        
                        <td>$30.00</td>
                        <td>$30.00</td>
                        <td>$30.00</td>
                        <td>$30.00</td>                       
                    </tr>
                    
                    <tr class="border-b-2">
                        <td>HN215</td>
                        <td class="flex items-center">
                            <img src="{{ URL('images/product-ex.png')}}" alt="" class="w-10 h-10 mr-2 border rounded">
                            8848 Test Product 01
                        </td>                        
                        <td>$30.00</td>
                        <td>$30.00</td>
                        <td>$30.00</td>
                        <td>$30.00</td>
                        
                    </tr>
                    <tr class="">
                        <td class="">HN215</td>
                        <td class="flex items-center">
                            <img src="{{ URL('images/product-ex.png')}}" alt="" class="w-10 h-10 mr-2 border rounded">
                            8848 Test Product 01
                        </td>                        
                        <td>$30.00</td>
                        <td>$30.00</td>
                        <td>$30.00</td>
                        <td>$30.00</td>
                        
                    </tr>
                    
                </table>
            </div>
        </div>

        <div class="flex">
            <div class="w-8 h-8">
                <svg id="showTableRow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span id="showTableRow" class="ml-2 text-blue-600 hover:text-gray-500">Add More Products</span>
        </div>
                     
        
        <div class="w-full mt-2 border rounded md:w-11/12">
            <div class="mt-2">
                <table class="w-full mt-5">
                    <tr class="ml-2 font-semibold text-blue-500 bg-gray-200">
                        <td class="py-5">#</td>
                        <td>Product Name</td>
                        <td>QTY</td>
                        <td>Price</td>
                        <td>Discount</td>
                        <td>Total</td>
                    </tr>
                    
                    <tr class="hidden">
                        <td>----</td>
                        <td class="flex items-center w-11/12 mt-2">
                            <img src="{{ URL('images/photo-camera.png')}}" alt="" class="w-10 h-10 mr-2">
                            <div class="relative">
                                <select class="mt-3 w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline mr-[20px]" name="country" id="country">
                                    <option class="text-sm" value="">Select Product</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                      </svg>                                  
                                </div>
                            </div>
                        </td>                        
                        <td>$30.00</td>
                        <td>$
                            <input
                                class="w-[40px] border-b text-center"
                                id=""
                                type="number"
                                placeholder="0"
                            />
                        </td>
                        <td>
                            <input
                                class="w-[40px] border-b text-center"
                                id=""
                                type="number"
                                placeholder="0"
                            />
                            %
                        </td>
                        <td>$10.00</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="w-1/4 py-3 ml-[550px] border-b">
            Sub Total
            <span class="ml-20">$100</span>
        </div>
        <div class="w-1/4 py-3 ml-[550px] border-b">
            Discounts
            <span class="ml-20">$100</span>
        </div>
        <div class="w-1/4 py-3 ml-[585px] border-b">
            Total
            <span class="ml-20">$100</span>
        </div>
    </div>
</div>

<script>
    
document.getElementById("showTableRow").addEventListener("click", function () {
    var tableRow = document.querySelector("tr.hidden");
    if (tableRow) {
        tableRow.classList.remove("hidden");
    }
});

</script>
  

@endsection
