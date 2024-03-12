<head>
    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

    <div class="w-[12%] px-2">
        <img src="{{$product->image(1)}}" alt="Image Description" class="w-full">
    </div>


    <div class="w-[20%] ">
    {{$product->title}}
    </div>

    <div class="w-[15%]">
    {{$product->category?->parent ? $product->category->parent->name : $product->category?->name ?? 'Undefined'}}
    </div>

    <div class="w-[15%]">
    {{$product->category?->parent ? $product->category?->name : null}}
    </div>

      <div class="w-[10%]">
        @if($product->in_stock)
        <label class="px-1 py-2 mx-auto text-center text-green-600 bg-green-200 rounded-lg"><span class="ml-4 mr-4">In stock</span></label>
        @else
        <label class="px-1 py-2 mx-auto text-center text-red-600 bg-red-200 rounded-lg"><span class="">Out of Stock</span></label>
        @endif
      </div>
      <div class="w-[10%]">
        ${{$product->price()}}
      </div>

    <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">
       
      
        <div class="w-40">
            <a href="/admin/products/{{$product->id}}/edit"><h1 class="px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit</h1></a>
        </div>
        <div class="w-40">
            <form class="delete-form" action="/admin/products/{{$product->id}}" method="post" onsubmit="confirmDelete(event, '{{$product->id}}')">
                @csrf
                @method('delete')
                <button type="submit" class="px-2 w-full py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(event, productId) {
        event.preventDefault(); 

        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, update form action and submit the form
                document.querySelector('.delete-form').action = "/admin/products/" + productId;
                document.querySelector('.delete-form').submit();
            }
        });
    }
</script>
