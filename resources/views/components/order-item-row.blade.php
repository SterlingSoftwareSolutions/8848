@props([
    'item' => null,
    'admin' => Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin'
])

<div class="flex flex-row items-center p-2 border">

    @if($admin)
        <input type="hidden" name="item_variant_{{$item->id}}" value="{{$item->variant->id}}">
    @endif

    <p class="w-1/6">
        <img src="{{ $item->variant->product->image_1 }}" alt="Product Image" class="max-w-[60px] aspect-square">
    </p>

    <div class="w-2/6">
        {{$item->variant->product->title}} -  {{$item->variant->name}}
    </div>

    @if (!auth()->user()->is_wholesale())
    <div class="w-1/6">
        ${{$item->full_price}}
    </div>

    <div class="w-1/6 flex">
        @if($admin)
        $<input name="item_price_{{$item->id}}" type="number" value="{{$item->price}}" class="max-w-[60px] ms-2">
        @else
        ${{$item->price}}
        @endif
    </div>
    @endif

    <div class="w-1/6">
        @if($admin)
        <input name="item_quantity_{{$item->id}}" type="number" value="{{$item->quantity}}" class="max-w-[60px] ms-2">
        @else
        {{$item->quantity}} Item{{$item->quantity == 1 ? '' : 's'}}
        @endif
    </div>
    @if (!auth()->user()->is_wholesale())
    <div class="w-1/6">
        ${{$item->price * $item->quantity}}
    </div>
    @endif
</div>
