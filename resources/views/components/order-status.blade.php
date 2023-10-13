@props([
  'status' => ''
])

@switch($status)
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