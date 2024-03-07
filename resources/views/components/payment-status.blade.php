@props(['status' => ''])

@switch($status)
    @case('unpaid')
        <label class="px-2 py-2 mx-auto text-center text-red-800 bg-red-200 rounded-lg">
            <span class="ml-2 mr-2">Unpaid</span>
        </label>
        @break

    @case('partial')
        <label class="px-2 py-2 mx-auto text-center text-yellow-800 bg-yellow-200 rounded-lg">
            <span class="ml-2 mr-2">Partial</span>
        </label>
        @break

    @case('paid')
        <label class="px-2 py-2 mx-auto text-center text-green-800 bg-green-200 rounded-lg">
            <span class="ml-4 mr-4">Paid</span>
        </label>
        @break

    @case('refunded')
        <label class="px-2 py-2 mx-auto text-center text-blue-800 bg-blue-200 rounded-lg">
            <span class="ml-4 mr-4">Refunded</span>
        </label>
        @break

    @default
        <label class="px-2 py-2 mx-auto text-center text-gray-800 bg-gray-200 rounded-lg">
            <span class="ml-1 mr-1">{{ $status }}</span>
        </label>
@endswitch
