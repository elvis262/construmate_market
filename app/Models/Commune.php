<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
   

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

  
    public function infoCommandes()
    {
        return $this->hasMany(InfoCommande::class);
    }
}
