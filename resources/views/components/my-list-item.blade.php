<div class="flex flex-row items-center">
    <div class="w-full">
        <img src="{{ asset($item?->variant?->product?->image(1)) }}" alt="">
    </div>

    <div class="w-full">
        {{$item?->variant?->product?->title}}
    </div>

    <div class="w-full">
        {{$item?->variant?->name}}
    </div>

    @if(!Auth::user()->is_wholesale())
    <div class="w-full">
        ${{$item?->variant?->price}}
    </div>
    @endif

    <div class="w-full flex flex-col gap-1">
        <form action="/cart/add" method="post">
            @csrf
            @if($item?->variant?->product?->in_stock)
            <input type="hidden" name="variant_id" value="{{$item?->variant?->id}}">
            <input type="hidden" name="my_list_item" value="{{$item?->variant->id}}">
            <button type="submit" class="w-1/2 p-2 bg-gradient-to-b from-[#166EB6] to-[#284297] rounded text-white hover:text-white">
                ADD TO CART
            </button>
            @else
            <button type="button" class="w-1/2 p-2 bg-gradient-to-b from-[#B6B6B6] to-[#979797] rounded text-white hover:text-white-500" disabled>
                OUT OF STOCK
            </button>
            @endif
        </form>
        <form action="{{route('removeMyList', $item?->variant?->product?->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-1/2 p-2 bg-gradient-to-b from-[#e77e7e] to-[#dc2626] rounded text-white hover:text-white">
                REMOVE
            </button>
        </form>
    </div>
</div>
</div>