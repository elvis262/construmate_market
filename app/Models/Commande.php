<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'traitee',
        'total_commande',
        'info_commande_id',
        'cart_id',
        'user_id',
        'transaction_id'
    ];
        /**
     * Get the transactions associated with the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    /**
     * Get the cart associated with the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function infoCommande()
    {
        return $this->belongsTo(InfoCommande::class);
    }

    /**
     * Get all of the Produits for the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot(['quantite','remise']);
    }
}
