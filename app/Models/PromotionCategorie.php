<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionCategorie extends Model
{
    use HasFactory;
    /**
     * Get all of the e_categories for the PromotionCategorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categorie_produits()
    {
        return $this->hasMany(CategorieProduit::class);
    }
}
