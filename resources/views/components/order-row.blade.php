<div class="flex flex-row item p-5">

  <div class="w-[5%] py-2 px-2">
    <input type="checkbox" class="h-7 w-7 md:h-8 md:w-8" />
  </div>

  <p class="w-[10%]">#{{$order->id}}</p>

  <div class="w-[10%]">
    {{ explode(' ', $order->created_at)[0]}}
  </div>

  <div class="w-[15%]">
    {{$order->user->first_name}} {{$order->user->last_name}}
  </div>

  <div class="w-[10%]">
  @switch($order->status)

    @case('pending')
      <label class="px-2 py-2 mx-auto text-center text-yellow-600 bg-yellow-200 rounded-lg"><span
          class="ml-2 mr-2">Pending</span>
      </label>
    @break

    @case('paid')
    <label class="px-2 py-2 mx-auto text-center text-green-600 bg-green-200 rounded-lg"><span
        class="ml-4 mr-4">Paid</span>
    </label>
    @break

    @case('unpaid')
      <label class="px-2 py-2 mx-auto text-center text-red-600 bg-red-200 rounded-lg"><span
          class="ml-2 mr-2">unpaid</span>
      </label>
    @break

    @default()
      <label class="px-2 py-2 mx-auto text-center text-gray-600 bg-gray-200 rounded-lg"><span
          class="ml-1 mr-1">{{$order->status}}</span>
      </label>
  @endswitch
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
    <div class="w-40">
      <h1 class="px-2 py-2 mx-auto text-center text-white bg-green-600 rounded-lg">Approve </h1>
    </div>
    <div class="w-40">
      <h1 class="px-2 py-2 mx-auto text-center text-white bg-red-600 rounded-lg">Cancel </h1>
    </div>
    <div class="w-40">
      <a href="/admin/orders/{{$order->id}}/edit"><h1 class="px-2 py-2 mx-auto text-center text-white bg-black rounded-lg">Edit </h1></a>
    </div>
  </div>
</div>