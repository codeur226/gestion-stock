<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;
    protected $table = 'LigneCommandes';
    public function materiel()
    {
      return $this->hasMany(materiel::class);
    }
    public function commande()
    {
      return $this->hasMany(commande::class);
    }
}
