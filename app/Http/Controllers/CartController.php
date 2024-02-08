<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\CSRF;
use Illuminate\Http\Request;
USE App\Models\Produit;
class CartController extends Controller
{
    public function index()
    {
      return view('cart.index');
    }

    public function addProductToCart(Request $request)
    {

        $product_id = $request->input('produit_id');
        $quantite = $request->input('quantite');

        $cart = auth()->user()->cart;
        $product = $cart->produits()->where('id', $product_id)->first();

        if ($product) {
          $newQuantite = $product->pivot->quantite + $quantite;
          $cart->produits()->updateExistingPivot($product_id, ['quantite' => $newQuantite]);
        } else {
          $cart->produits()->attach($product_id, ['quantite' => $quantite]);
        }

        return response()->json([
          'success' => true,
        ]);
      
    }

}