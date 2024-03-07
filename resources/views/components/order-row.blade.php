<div class="flex flex-row items-center p-5">
  <p class="w-[10%]">#{{$order?->reference}}</p>

  <div class="w-[10%]">
    {{$order?->order_type == 'retail' ? 'Retail' : 'Wholesale'}}
  </div>

  <div class="w-[10%]">
    {{ explode(' ', $order?->created_at)[0]}}
  </div>

  <div class="w-[10%]">
    @if($order->user)
      {{$order?->user?->first_name}} {{$order?->user?->last_name}}
    @else
    <div class="text-red-500">No User</div>
    @endif
  </div>

  <div class="w-[10%]">
    <form action="/admin/orders/{{$order->id}}" method="post">
      @csrf
      @method('put')
      <input type="hidden" name="payment_status" value="{{$order->payment_status}}">
      <input type="hidden" name="order_type" value="{{$order->order_type}}">
      <select class="p-3 bg-blue-50 border-blue-300 w-30 border rounded-lg" onchange="this.form.submit()" name="status">
          <option value="unverified" @if($order->status == 'unverified') selected @endif>Unverified</option>
          <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
          <option value="processing" @if($order->status == 'processing') selected @endif>Processing</option>
          <option value="shipped" @if($order->status == 'shipped') selected @endif>Shipped</option>
          <option value="delivered" @if($order->status == 'delivered') selected @endif>Delivered</option>
          <option value="returned" @if($order->status == 'returned') selected @endif>Returned</option>
          <option value="canceled" @if($order->status == 'canceled') selected @endif>Canceled</option>
          <option value="rejected" @if($order->status == 'rejected') selected @endif>Rejected</option>
      </select>
    </form>
  </div>

  <div class="w-[10%]">
    {{$order?->items->count()}}
  </div>

  <div class="w-[10%]">
    0%
  </div>

  <div class="w-[10%]">
    ${{$order->total()}}
  </div>

  <div class="md:flex flex-row gap-1 w-[15%] mx-1">
    @if($order?->status == 'unverified')
      <a href="/admin/orders/{{$order?->id}}/approve"><h1 class="py-1 px-2 text-center w-full bg-green-600 text-white rounded-lg">Approve</h1></a>
      <a href="/admin/orders/{{$order?->id}}/reject"><h1 class="py-1 px-2 text-center w-full bg-red-600 text-white rounded-lg">Reject</h1></a>
    @endif
      <a href="/admin/orders/{{$order?->id}}/edit"><h1 class="py-1 px-2 text-center w-full bg-gray-600 text-white rounded-lg">Edit </h1></a>
      <a href="/admin/orders/{{$order?->id}}/print"><h1 class="py-1 px-2 text-center w-full bg-gray-600 text-white rounded-lg">Print</h1></a>
  </div>
</div>
