<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    
    public function info_commande()
    {
        return $this->belongsTo(InfoCommande::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot(['quantite','remise']);
    }



    public function getTraiteeBrowseAttribute()
    {
        return $this->traitee == 0? 'Non' :'Oui';
    }
    public function getStatusBrowseAttribute()
    {
        return $this->status == 0? 'Impayée' :'Payée';
    }
}
