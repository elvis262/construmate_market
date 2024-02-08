<?php

namespace App\Livewire;

use Livewire\Component;

class CartLine extends Component
{
    public object $product;
    public int $quantity = 1;
    public int $total = 1;
    public int $price = 0;

    public function mount($product)
    {
        $this->product = $product;
        $this->quantity = $product->pivot->quantite;
        $this->total = $product->pivot->quantite * $product->prix;
        $prom = promo($product);
        if($prom != 0){
            $this->price =  $product->prix - ( $product->prix * $prom) ;
        }else {
            $this->price =  $product->prix;
        }
    }
    
    public function incrementQuantity(){
        if($this->quantity < $this->product->quantite_stock){
            $this->quantity++;
            auth()->user()->cart->produits()->updateExistingPivot($this->product->id, ['quantite' => $this->quantity]);
            $this->dispatch('cartUpdated');
        }
    }

    public function decrementQuantity(){
        if($this->quantity > 1){
            $this->quantity--;
            auth()->user()->cart->produits()->updateExistingPivot($this->product->id, ['quantite' => $this->quantity]);
            $this->dispatch('cartUpdated');
        }
    }

    public function removeProduct(int $productId){
        try {
            auth()->user()->cart->produits()->detach($productId);
            $this->dispatch('cartUpdated');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('errorWhenTryingToRemoveProduct', ['message'=>'Une erreur est survenue lors de la suppression du produit']);
        }
      
    }   
    
    public function render()
    {
        return view('livewire.cart-line');
    }
}