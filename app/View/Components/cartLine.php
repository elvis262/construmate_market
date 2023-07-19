<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cartLine extends Component
{
    /**
     * Create a new component instance.
     */
    public $line;
    public function __construct(public object $product)
    {
        $this->line = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-line');
    }
}
