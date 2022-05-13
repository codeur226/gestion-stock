<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterielPropriete extends Model
{
    use HasFactory;

    public $table = "materiel_propriete";
    public $fillable = [
        "materiels_id","propriete_materiels_id", "valeur"
    ];

    public function propriete(){
        return $this->hasOne(ProprieteMateriel::class,'id', 'propriete_materiels_id'); 
    }

}
