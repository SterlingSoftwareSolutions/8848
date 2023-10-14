<div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

    <div class="w-1/5">
        <img src="{{ $category->icon }}" alt="Image Description" class="max-w-[150px] ms-4">
    </div>
    <div class="w-1/5 ">
        {{$category->name}}
    </div>

    <div class="w-1/5">
        {{$category->children->count()}} Sub {{$category->children->count() == 1 ? 'Category' : 'Categories'}}
    </div>

    <div class="w-1/5">
        {{$category->products()->count()}} Items
    </div>

    <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">
        <div class="w-[95px]">
            <a href="/admin/categories/{{$category->id}}/edit"><button class="w-full px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </button></a>
        </div>
        <div class="w-[95px]">
            <form action="/admin/categories/{{$category->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="w-full px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</button>
            </form>
        </div>
    </div>
</div>