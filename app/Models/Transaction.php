<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant',
        'mode_paiement',
        'status'
    ];
        /**
     * Get the commande associated with the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function commande()
    {
        return $this->hasOne(Commande::class);
    }
}
