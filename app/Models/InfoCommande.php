<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCommande extends Model
{
    use HasFactory;
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

}
