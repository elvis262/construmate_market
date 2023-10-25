<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public function categorie_produit()
    {
        return $this->belongsTo(CategorieProduit::class);
    }
   
    
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
    
    
    public function promotion_produit()
    {
        return $this->belongsTo(PromotionProduit::class);
    }
  
    
    public function avis(): HasMany
    {
        return $this->hasMany(Avi::class);
    }


    public function commandes()
    {
        return $this->belongsToMany(Comment::class)>withPivot(['quantite','remise']);
    }
}
