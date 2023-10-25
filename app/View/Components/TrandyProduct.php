<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Produit;

class TrandyProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public $trandyProducts;
    public function __construct()
    {
        $this->trandyProducts = Produit::with(['categorie_produit','promotion_produit'])->orderby('nb_commande','desc')->limit(12)->get(); 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.trandy-product');
    }
}
