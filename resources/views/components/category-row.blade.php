@props([
    'category' => null
])

<div class="flex flex-row items-center py-5 text-gray-500 border-b-2 border-gray-300">

    <div class="w-1/6 p-6">
        <img src="{{ $category->Background }}" alt="Image Description" class="w-full aspect-square bg-red-500 rounded">
    </div>
    <div class="w-1/6 p-2 ">
        {{$category->name}}
    </div>

    <div class="w-1/6 p-2">
        {{$category->parent ? $category->parent->name : 'None'}}
    </div>

    <div class="w-1/6 p-2">
        <a href="/admin/categories/{{$category->id}}" >
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
        <div class="w-[95px]">
            <form action="/admin/categories/{{$category->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="w-full px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</button>
            </form>
        </div>
    </div>
</div>