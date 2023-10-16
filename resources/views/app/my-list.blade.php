@extends('layouts.app', ['title' => 'Orders'])
@section('content')
{{-- End Dropdowns & Buttons Row --}}
<div class="flex flex-col border-2 rounded-lg">
    <div class="text-blue-900">
        <div class="flex flex-row p-5 bg-gray-100">
            <p class="w-1/6 text-start font-semibold">Product ID</p>
            <p class="w-1/6 text-start font-semibold">Product</p>
            <p class="w-1/6 text-start font-semibold">Image</p>
            <p class="w-1/6 text-start font-semibold">Action</p>
        </div>
        @if($myList->count() < 1) <div class="flex flex-row items-center p-5">
            <div class="w-full text-center py-12">You don't have any Items</div>
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
