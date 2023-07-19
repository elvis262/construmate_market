<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionCategorie extends Model
{
    use HasFactory;

    public function categorie_produits()
    {
        return $this->hasMany(CategorieProduit::class);
    }
}
