<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $total = 0;
    public $product_cart_product_number = 0;
    public function mount()
    {
        $products = $this->getCart();
        if ($products) {
            foreach ($products as $product) {
                $this->product_cart_product_number += $product->pivot->quantite;
                $this->total += $product->pivot->quantite * $product->prix;
            }
        }
    }
    
    private function getCart(){
        if (\Auth::user()) {
            $cartProductQuantity = 0;
            $cart = auth()->user()->cart;
            return $cart->produits()->get();
        }
        return null;
    }
    
    public function render()
    {
        return view('livewire.cart', [
            'cart' => $this->getCart()
        ]);
    }
}