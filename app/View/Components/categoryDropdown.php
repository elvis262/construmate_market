<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\CategorieProduit;

class categoryDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;
    public function __construct(public bool $caroussel = false)
    {
        $this->categories = CategorieProduit::get(['id','nom']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-dropdown');
    }
}
