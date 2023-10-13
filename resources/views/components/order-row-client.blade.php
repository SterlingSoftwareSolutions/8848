<div class="flex flex-row items-center p-5">

    <p class="w-1/6">
        #{{$order->reference}}
    </p>

    <div class="w-1/6">
        {{ explode(' ', $order->created_at)[0]}}
    </div>

    <div class="w-1/6">
        <x-order-status :status="$order->status"/>
    </div>

    <div class="w-1/6">
        {{$order->items->count()}} Item{{$order->items->count() == 1 ? '' : 's'}}
    </div>

    <div class="w-1/6">
        ${{$order->items->sum('price')}}
    </div>

    <div class="w-1/6">
        <a href="/orders/{{$order->id}}">
            <h1 class="px-2 py-2 mx-auto text-center text-white bg-gray-800 rounded-lg">View</h1>
        </a>
    </div>
</div>