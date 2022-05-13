<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entree extends Model
{
    use HasFactory;
    protected $table = 'entrees';
    public $fillable = [
      "nom", "materiels_id","fournisseurs_id","quantite_entree","date_entree"/*,"stock_initial"*/
  ];


    public function materiel()
    {
      return $this->hasMany(materiel::class);
    }

    public function fournisseur()
    {
      return $this->hasMany(fournisseur::class);
    }
}
