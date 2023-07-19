<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProductsController extends Controller
{
    public function getTrandyProducts(int $limit){
        return ProductResource::collection(Produit::with(['categorie_produit','promotion_produit'])->orderby('nb_commande','desc')->limit($limit)->get());
    }
    public function getRecentProducts(int $limit){
        return ProductResource::collection(Produit::with(['categorie_produit','promotion_produit'])->orderby('created_at','desc')->limit($limit)->get());
    }
}
