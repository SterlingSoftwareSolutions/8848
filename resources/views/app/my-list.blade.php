@extends('layouts.app', ['title' => 'Orders'])
@section('content')
{{-- End Dropdowns & Buttons Row --}}
<div class="flex flex-col border-2 rounded-lg">
    <div class="text-blue-900">
        <div class="flex flex-row p-5 bg-gray-100 h-full">
            <p class="flex-1 text-start font-semibold">Image</p>
            <p class="flex-1 text-start font-semibold">Product</p>
            <p class="flex-1 text-start font-semibold">Variant</p>
            @if(!Auth::user()->is_wholesale())
            <p class="flex-1 text-start font-semibold">Price</p>
            @endif
            <p class="flex-2 text-start font-semibold">Action</p>
        </div>

        @if($myList->count() < 1)
            <div class="flex items-center p-5">
                <div class="w-full text-center py-12">You don't have any items</div>
            </div>
        @else
            <!-- ORDERS -->
            @foreach($myList as $item)
                <x-my-list-item :item="$item" />
            @endforeach
        @endif

        <div class="flex justify-center p-5">
            {{$myList->links()}}
        </div>
    </div>
</div>

@endsection
