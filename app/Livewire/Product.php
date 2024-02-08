<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $product;

    public function addProduct($productId){
        if(!\Auth::user()){
            return redirect()->route('login');
        }else{
            try {
                $cart = auth()->user()->cart;
                $product = $cart->produits()->where('id', $productId)->first();
                
                if ($product) {
                    $newQuantite = $product->pivot->quantite + 1;
                    $cart->produits()->updateExistingPivot($productId, ['quantite' => $newQuantite]);
                } else {
                    $cart->produits()->attach($productId, ['quantite' => 1]);
                }
                $this->dispatch('productAdded', ['message'=>'Le produit a été ajouté au panier']);
            } catch (\Throwable $th) {
                $this->dispatch('errorWhenTryingToAddProduct', ['message'=>'Erreur lors de l\'ajout du produit au panier']);
            }

        }
        
    }
    
    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.product');
    }
}