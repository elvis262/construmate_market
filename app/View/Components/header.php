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
    public $caroussel;
    public function __construct(public bool $showCaroussel)
    {
        if (\Auth::user()) {
            $cart = auth()->user()->cart;
            $this->product_cart_number = $cart->produits()->count();
        }
        $this->caroussel = $showCaroussel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
