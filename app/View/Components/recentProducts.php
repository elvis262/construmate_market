<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Produit;

class recentProducts extends Component
{
    /**
     * Create a new component instance.
     */
    public $recentProducts;
    public function __construct()
    {
        $this->recentProducts = Produit::with(['categorie_produit','promotion_produit'])->orderby('created_at','desc')->limit(12)->get(); 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recent-products');
    }
}
