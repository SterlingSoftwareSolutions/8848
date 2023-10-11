<div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

    <div class="w-[5%] py-2 px-2">
        <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
    </div>

    <div class="w-[10%] px-2">
        <img src="{{$product->image_1_url}}" alt="Image Description" class="w-full">
    </div>


    <div class="w-[20%] ">
    {{$product->title}}
    </div>

    <div class="w-[10%]">
    {{$product->category->parent->name}}
    </div>

    <div class="w-[10%]">
    {{$product->category->name}}
    </div>

      <div class="w-[10%]">
        @if($product->in_stock)
        <label class="px-2 py-2 mx-auto text-center text-green-600 bg-green-200 rounded-lg"><span class="ml-4 mr-4">In stock</span></label>
        @else
        <label class="px-2 py-2 mx-auto text-center text-red-600 bg-red-200 rounded-lg"><span class="">Out of Stock</span></label>
        @endif
      </div>
      <div class="w-[10%]">
        ${{$product->price()}}
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