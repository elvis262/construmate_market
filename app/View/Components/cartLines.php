<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cartLines extends Component
{
    /**
     * Create a new component instance.
     */
    public $cartProducts;
    public function __construct(public $products)
    {
        $this->cartProducts = $products;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-lines');
    }
}
