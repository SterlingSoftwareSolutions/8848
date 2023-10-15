<div id="side-menu" class="fixed top-0 -right-[350px] w-[350px] h-screen z-50 bg-white p-5 flex flex-col space-y-5 text-black duration-300">
    <a href="javascript:void(0)" class="text-4xl text-left" onclick="closeMenu()">&times;</a>

    @if(!$logged_in)
      <div class="text-center">You are not logged in.</div>
    @else
    <div>
        @if(count($items) < 1)
          <div class="text-center py-8">Your cart is empty</div>
        @else
            @foreach($items as $item)
                <div class="flex flex-row my-4">
                  <div>
                    <img src="{{$item->variant->product->image_1}}" class="w-auto h-20" alt="" srcset="">
                  </div>
                  <div class="flex flex-col gap-5">
                    <h1 class=" text-base font-semibold text-[#284297]">{{$item->variant->product->title}}</h1>
                    <div class="flex flex-row gap-20">
                        @if (!auth()->user()->is_whsl_user())
                        <h1 class=" text-lg font-semibold text-[#48525c]">{{$item->quantity}} × ${{$item->variant->price}}</h1>
                        @endif
                        <a href="/cart/remove/{{$item->variant->id}}"><button type="submit"><i class="mt-2 fa-solid fa-xmark"></i></button></a>
                    </div>
                  </div>
                </div>
            @endforeach
        @endif

        <hr class="w-full">
        @if (!auth()->user()->is_whsl_user())
        <h1 class="mt-5 text-xl font-extrabold text-center text-black ">Subtotal: <span class="text-xl font-semibold ">${{$total_price}}</span></h1>
        @endif
        <hr class="w-full mt-5">
        <div class="flex flex-row justify-center gap-5 mt-5">
          <a href="/cart" class="bg-[#284297] hover:bg-blue-700 text-white font-bold py-2 px-4">
            View cart
          </a>
          <a href="/checkout" class="bg-[#284297] hover:bg-blue-700 text-white font-bold py-2 px-4">
            {{auth()->user()->is_whsl_user() ? 'Place order' : 'Checkout'}}
          </a>
        </div>
    </div>
    @endif
</div>
