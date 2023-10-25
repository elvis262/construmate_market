<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     */
    public $product_cart_number = 0;

    public function __construct()
    {
        if (\Auth::user()) {
            $cart = auth()->user()->cart;
            $this->product_cart_number = $cart->produits()->count();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
