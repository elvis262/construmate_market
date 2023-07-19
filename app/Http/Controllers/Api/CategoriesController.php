<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategorieProduitResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategorieProduit;

class CategoriesController extends Controller
{
    public function getCategories(Request $request){
        return CategorieProduitResource::collection(CategorieProduit::get());
    }
    
}
