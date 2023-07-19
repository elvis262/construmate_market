<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\CSRF;
use Illuminate\Http\Request;
USE App\Models\Produit;
class CartController extends Controller
{
    public function cart()
    {
      $cart = auth()->user()->cart;
      $products = $cart->produits()->get();
      return view('cart.cart', compact('products'));
    }

    public function addProductToCart(Request $request)
    {
      $product_id = $request->input('produit_id');
      $quantite = $request->input('quantite');
      

      $user = \Auth::user();
      $cart = $user->cart ;
      $cart->produits()->attach($product_id, ['quantite' => $quantite]);


      return response()->json([
        'success' => true,
      ]);
    }

    public function updateCart(Request $request)
    {
      $product_id = $request->input('produit_id');
      $quantite = $request->input('quantite');

      $cart = auth()->user()->cart;
      $product = $cart->produits()->where('id',$product_id)->first();

      if($product->pivot->quantite != $quantite){
        $cart->produits()->updateExistingPivot($product_id, ['quantite' => $quantite]);
      }
      
      return response()->json([
        'success' => true,
      ]);
    }

    public function removeInCart(Request $request)
    {
      $cart = auth()->user()->cart;
      $cart->produits()->detach($request->input('produit_id'));

      return response()->json([
        'success' => true,
      ]);
    }
}
