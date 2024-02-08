<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class CartContainer extends Component
{
    public $total = 0;
    #[On('cartUpdated')]
    public function onCartUpdated(){
        $this->reset("total");
    }
    
    public function render()
    {
        $cart = auth()->user()->cart;
        $products = $cart->produits()->get();
        foreach($products as $product){
            $promo = promo($product);
            if($promo != 0){
                $this->total += $product->pivot->quantite * ( $product->prix - ($product->prix * $promo)) ;
            }else{
                $this->total += $product->prix * $product->pivot->quantite;        
            }
        }
        return view('livewire.cart-container', [
            "products" => $products
        ]);
    }
}