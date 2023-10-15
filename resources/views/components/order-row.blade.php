<div class="flex flex-row items-center p-5">
  <p class="w-[10%]">#{{$order?->reference}}</p>

  <div class="w-[10%]">
    {{$order?->order_type == 'retail' ? 'Retail' : 'Wholesale'}}
  </div>

  <div class="w-[10%]">
    {{ explode(' ', $order?->created_at)[0]}}
  </div>

  <div class="w-[10%]">
    {{$order?->user?->first_name}} {{$order?->user?->last_name}}
  </div>

  <div class="w-[10%]">
    <x-order-status :status="$order?->status"/>
  </div>

  <div class="w-[10%]">
    {{$order?->items->count()}}
  </div>

  <div class="w-[10%]">
    0%
  </div>

  <div class="w-[10%]">
    ${{$order?->items->sum('price')}}
  </div>

  <div class="md:flex flex-row gap-1 w-[10%] mx-1">
    @if($order?->status == 'unverified')
      <a href="/admin/orders/{{$order?->id}}/approve"><h1 class="p-2 text-center w-[80px] bg-green-600 text-white rounded-lg">Approve</h1></a>
      <a href="/admin/orders/{{$order?->id}}/reject"><h1 class="p-2 text-center w-[80px] bg-red-600 text-white rounded-lg">Reject</h1></a>
    @endif
      <a href="/admin/orders/{{$order?->id}}/edit"><h1 class="p-2 text-center w-[80px] bg-gray-600 text-white rounded-lg">Edit </h1></a>
  </div>
</div>
