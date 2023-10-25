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
    /**
     * The carts that belong to the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantite');
    }
    /**
     * Get the promotion_produit that owns the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function promotion_produit()
    {
        return $this->belongsTo(PromotionProduit::class);
    }
    /**
     * Get all of the avis for the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function avis()
    {
        return $this->hasMany(Avi::class);
    }

    /**
     * Get all of the commandes for the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function commandes()
    {
        return $this->belongsToMany(Comment::class)>withPivot(['quantite','remise']);
    }
}
