<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class Cart extends Component
{
    public $total = 0;
    public $product_cart_product_number = 0;
    
    
    
    private function getCart(){
        if (\Auth::user()) {
            $cartProductQuantity = 0;
            $cart = auth()->user()->cart;
            return $cart;
        }
        return null;
    }
    
    #[On('productAdded')] 
    #[On('cartUpdated')] 
    public function onProductAdded(){
        $this->reset("total");
        $this->reset("product_cart_product_number");
    }

    public function removeProduct($productId){
        
        try {
            $cart = $this->getCart();
            if($cart){       
                $cart->produits()->detach($productId);
                $this->reset("total");
                $this->reset("product_cart_product_number");
            }
        } catch (\Throwable $th) {
            $this->dispatch('errorWhenTryingToRemoveProduct', ['message'=>'Une erreur est survenue lors de la suppression du produit']);
        }
    }
    
    public function render()
    {
        $products = $this->getCart()->produits()->get();
        if ($products) {
            foreach ($products as $product) {
                $this->product_cart_product_number += $product->pivot->quantite;
                $this->total += $product->pivot->quantite * $product->prix;
            }
        }
        return view('livewire.cart', [
            'cart' => $products
        ]);
    }
}