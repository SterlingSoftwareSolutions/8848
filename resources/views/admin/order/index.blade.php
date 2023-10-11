@extends('layouts.admin') @section('content')

<div class="md:mb-5">

        <div class="flex flex-col items-center gap-2 mx-2 mt-5 md:flex-row md:mx-10 ">
            <input type="checkbox" class="w-6 h-6 md:h-7 md:w-7" />

            <div class="flex justify-between w-full">
                <h1 class="px-2 py-2 text-center text-white bg-red-600 rounded-lg">Delete All</h1>

                <h1 class="px-2 py-2 text-center text-white bg-blue-900 rounded-lg ">New Order</h1>
            </div>
        </div>

    
        {{-- End Dropdowns & Buttons Row --}}
    
        <x-order-table />
    </div>
    
          

            
        </div>
    </div>


</div>
@endsection
