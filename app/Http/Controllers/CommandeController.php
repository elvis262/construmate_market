<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommandeRequest;
use App\Models\Commune;
use App\Models\InfoCommande;
use App\Models\Commande;
use App\Models\Transaction;


class CommandeController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        $cart = $user->cart;
        $temp_products = $cart->produits()->get();
        $communes = Commune::orderby('nom')->get();
        $update = false;

        foreach ($temp_products as $product) {
            
            if($product->quantite_stock == 0){
                $cart->produits()->detach($product->id);
                
                if(!$update) $update = true;

            }else if($product->quantite_stock < $product->pivot->quantite){

                $cart->produits()->updateExistingPivot($product->id, ['quantite' => $product->quantite_stock]);
                
                if(!$update) $update = true;

            }
        }

        $products = $cart->produits()->get();

     

        if(count($products) == 0){
            return redirect()->route('product.index')->with(['emptyCart' => true]);
        }else if($update){
            return redirect()->back()->with(['update'=> true]);
        }

        return view('commande.index',compact(['user', 'communes','products']));
    

        
    }

    public function processToCommande(CommandeRequest $request)
    {
        $total = 0;
        $user = auth()->user();
        $cart = $user->cart;
        $products = $cart->produits()->get();
        
        $infoCom = new InfoCommande();
        $infoCom->adresse = $request->validated()['adresse'];
        $infoCom->nom = $request->validated()['nom'];
        $infoCom->prenom = $request->validated()['prenom'];
        $infoCom->email = $request->validated()['email'];
        $infoCom->tel = $request->validated()['tel'];
        $infoCom->tel_2 = $request->input('tel_2');
        $infoCom->info_sup = $request->input('info_sup');
        $infoCom->commune_id = (int) $request->validated()['zone_liv'];
        $infoCom->save();

        $order = Commande::create([
            'traitee' =>false,
            'info_commande_id' => $infoCom->id,
            'cart_id' => $cart->id,
            'user_id' => $user->id,
            'status' => false
        ]);

        foreach ($products as $product) {
            $remise = promo($product);
            $price = $product->prix - ($product->prix * $remise);
            $total += $price * $product->pivot->quantite;
            $order->produits()->attach($product->id, ['quantite' => $product->pivot->quantite, 'remise' => $remise]);
            $cart->produits()->detach($product->id);
        }
        
        $order->total_commande = $total;
       
        $order->save();
       
    }
}
