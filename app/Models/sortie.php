<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sortie extends Model
{
    use HasFactory;

    protected $fillable = ["nom", "quantite_sortie", "date_sortie","imputable","destinations_id","materiels_id","fournisseurs_id"];
    protected $table = 'sorties';

    public function materiel()
    {
      return $this->hasMany(materiel::class);
    }

    public function destination()
    {
      return $this->hasMany(destination::class);
    }
}
