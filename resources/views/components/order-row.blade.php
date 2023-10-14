<div class="flex flex-row items-center p-5">

  <div class="w-[5%] py-2">
    <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
  </div>

  <p class="w-[10%]">#{{$order->reference}}</p>

  <div class="w-[10%]">
    {{ explode(' ', $order->created_at)[0]}}
  </div>

  <div class="w-[15%]">
    {{$order->user->first_name}} {{$order->user->last_name}}
  </div>

  <div class="w-[10%]">
    <x-order-status :status="$order->status"/>
  </div>

  <div class="w-[10%]">
    {{$order->items->count()}}
  </div>

  <div class="w-[10%]">
    0%
  </div>

  <div class="w-[10%]">
    ${{$order->items->sum('price')}}
  </div>

  <div class="md:flex flex-row gap-1 w-[20%] mx-1">
    @if($order->status == 'unverified')
    <div class="w-40">
      <a href="/admin/orders/{{$order->id}}/approve"><h1 class="px-2 py-2 mx-auto text-center bg-green-600 text-white rounded-lg">Approve</h1></a>
    </div>
    <div class="w-40">
      <a href="/admin/orders/{{$order->id}}/reject"><h1 class="px-2 py-2 mx-auto text-center bg-red-600 text-white rounded-lg">Reject</h1></a>
    </div>
    @endif
    <div class="w-40">
      <a href="/admin/orders/{{$order->id}}/edit"><h1 class="px-2 py-2 mx-auto text-center bg-gray-600 text-white rounded-lg">Edit </h1></a>
    </div>
  </div>
</div>