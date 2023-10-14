@props(['status' => ''])

@switch($status)
    @case('pending')
        <label class="px-2 py-2 mx-auto text-center text-yellow-800 bg-yellow-200 rounded-lg">
            <span class="mx-2">Pending</span>
        </label>
        @break

    @case('unverified')
        <label class="px-2 py-2 mx-auto text-center text-gray-800 bg-gray-200 rounded-lg">
            <span class="mx-2">Unverified</span>
        </label>
        @break

    @case('processing')
        <label class="px-2 py-2 mx-auto text-center text-indigo-800 bg-indigo-200 rounded-lg">
            <span class="mx-2">Processing</span>
        </label>
        @break

    @case('shipped')
        <label class="px-2 py-2 mx-auto text-center text-purple-800 bg-purple-200 rounded-lg">
            <span class="mx-2">Shipped</span>
        </label>
        @break

    @case('delivered')
        <label class="px-2 py-2 mx-auto text-center text-green-800 bg-green-200 rounded-lg">
            <span class="mx-2">Delivered</span>
        </label>
        @break

    @case('returned')
        <label class="px-2 py-2 mx-auto text-center text-orange-800 bg-orange-200 rounded-lg">
            <span class="mx-2">Returned</span>
        </label>
        @break

    @case('canceled')
        <label class="px-2 py-2 mx-auto text-center text-gray-800 bg-gray-200 rounded-lg">
            <span class="mx-2">Canceled</span>
        </label>
        @break

    @case('rejected')
        <label class="px-2 py-2 mx-auto text-center text-red-800 bg-red-200 rounded-lg">
            <span class="mx-2">Rejected</span>
        </label>
        @break

    @default
        <label class="px-2 py-2 mx-auto text-center text-gray-800 bg-gray-200 rounded-lg">
            <span class="mx-2">{{ $status }}</span>
        </label>
@endswitch
