<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProprieteMateriel extends Model
{
    use HasFactory;
    public $table = "propriete_materiels";
    protected $fillable = ["nom", "estObligatoire", "categorie_materiels_id"];
    public $timestamps = false;

    public function categorie(){
        return $this->belongsTo(CategorieMateriel::class, "categorie_materiels_id", "id");
    }

    public function materiels(){
        return $this->belongsToMany(Materiel::class, "materiel_propriete", "propriete_materiels_id", "materiels_id");
    }
}
