<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieProduit extends Model
{
    use HasFactory;
    public function produits()
    {
        return $this ->hasMany(Produit::class);
    }
    /**
     * Get the promotion_categorie that owns the E_Categorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function promotion_categorie()
    {
        return $this->belongsTo(PromotionCategorie::class);
    }
}
