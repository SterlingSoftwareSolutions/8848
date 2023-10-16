<div class="flex flex-row items-center p-5">

    <p class="w-1/6">
        #{{$item?->product->id}}
    </p>

    <div class="w-1/6">
        {{$item?->product->title}}
    </div>
    <div class="w-1/6">
        <img src="{{ asset($item?->product->image(1)) }}" alt="">
    </div>

    <div class="w-1/6">

        <form {{ $item?->product->variants->count() <= 1 ? "action=/cart/add method=post " : null}}>
            @csrf
            @if($item?->product->in_stock)
            @if($item?->product->variants->count() == 1)
            <input type="hidden" name="variant_id" value="{{$item?->product->variants[0]->id}}">
            <input type="hidden" name="my_list_item" value="{{$item?->product->id}}">
            <div class="grid gap-2">
                <button type="submit" class="w-3/4 p-2  bg-gradient-to-b from-[#166EB6] to-[#284297] rounded-sm text-white hover:text-white">
                    ADD TO CART
                </button>
                @else
                <a href="/products/{{$item?->product->id}}" class="w-3/4 p-2 bg-gradient-to-b from-[#166EB6] to-[#284297] rounded-sm text-center text-white hover:text-white">
                    VIEW OPTIONS
                </a>
                @endif
                @else
                <button type="button" class="w-3/4 p-2 bg-gradient-to-b from-[#B6B6B6] to-[#979797] rounded-sm text-white hover:text-white-500" disabled>
                    OUT OF STOCK
                </button>
                @endif
        </form>
        <form action="{{route('removeMyList', $item?->product->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-3/4 p-2 bg-gradient-to-b from-[#e77e7e] to-[#dc2626] rounded-sm text-white hover:text-white">
                REMOVE
            </button>
        </form>
    </div>
</div>
</div>