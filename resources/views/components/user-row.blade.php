<div class="flex flex-row py-5 text-gray-500 border-b-2 border-gray-300 ">


    <div class="w-[20%] pl-5">
        {{$user->first_name}} {{$user->last_name}}
    </div>

    <div class="w-[15%]">
        {{$user->address_billing->city ?? '-'}}
    </div>

    <div class="w-[15%]">
        {{$user->address_billing->address_line_1 ?? '-'}}
    </div>


    <div class="w-[10%]">
        {{$user->phone ?? '-'}}
    </div>

    <div class="w-[10%]">
        {{$user->role ?? '-'}}
    </div>

    <div class="w-[10%]">
        {{$user->priority ?? '-'}}
    </div>

    <div class="md:flex flex-row gap-1 w-[15%] justify-end mx-1">

        <div class="w-40">
            <a href="/admin/users/{{$user->id}}/edit"><h1 class="px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </h1></a>
        </div>
        <div class="w-40">
            <form action="/admin/users/{{$user->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="px-2 w-full py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Delete</button>
            </form>
        </div>
    </div>
</div>