<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class SlideoutCart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = Auth::user();
        if(!$user){
            return view('components.slideout-cart',[
                'logged_in' => false
            ]);
        }
        $items = $user->cart_items;
        $total_price = $items->sum(function($cart_item){
            return $cart_item->variant->price * $cart_item->quantity;
        });

        return view('components.slideout-cart',[
            'logged_in' => true,
            'quantity' => $items->sum('quantity'),
            'total_price' => $total_price,
            'items' => $items
        ]);
    }
}
