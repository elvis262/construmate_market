<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCommande extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'tel',
        'tel_2',
        'commune_id',
        'info_sup'
    ];
    /**
     * Get the Commande that owns the InfoCommande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
