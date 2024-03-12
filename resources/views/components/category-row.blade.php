@props([
    'category' => null
])
<head>
    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

    <div class="w-1/6 p-6">
        <img src="{{ $category->Background}}" alt="Image Description" class="w-full aspect-square object-cover bg-red-500 rounded">
    </div>
    <div class="w-1/6 p-2">
        {{$category->name}}
    </div>

    <div class="w-1/6 p-2">
        {{$category->parent ? $category->parent->name : 'None'}}
    </div>

    <div class="w-1/6 p-2">
        <a href="/admin/categories/{{$category->id}}" class="underline hover:underline-offset-4">
            {{$category->children->count()}} Sub {{$category->children->count() == 1 ? 'Category' : 'Categories'}}
        </a>
    </div>

    <div class="w-1/6 p-2">
        {{$category->products()->count()}} Item{{$category->products()->count() == 1 ? '' : 's'}}
    </div>

    <div class="md:flex flex-row gap-1 w-1/6 p-2 justify-end mx-1">
        <div class="w-[95px]">
            <a href="/admin/categories/{{$category->id}}/edit"><button class="w-full px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </button></a>
        </div>
        <div class="w-40">
            <form class="delete-form" action="/admin/categories/{{$category->id}}" method="post" onsubmit="confirmDelete(event, '{{$category->id}}')">
                @csrf
                @method('delete')
                <button type="submit" class="px-2 w-full py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(event, categoryId) {
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
                document.querySelector('.delete-form').action = "/admin/categories/" + categoryId;
                document.querySelector('.delete-form').submit();
            }
        });
    }
</script>