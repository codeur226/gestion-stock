<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    protected $table = 'materiels';
    public $fillable = ["nom", "noSerie", "imageUrl","stock"/*,"estDisponible"*/,"categorie_materiels_id"/*,"fournisseurs_id","quantite_entree","date_entree","stock_initial"*/
    ];
    //public $guarded=[];
    
    public function Categorie(){
        return $this->belongsTo(CategorieMateriel::class,"categorie_materiels_id", "id");
    }

    public function proprietes(){
        return $this->belongsToMany(ProprieteMateriel::class,"materiel_propriete", "materiels_id", "propriete_materiels_id");
    }

    public function materiel_propriete(){
        return $this->hasMany(MaterielPropriete::class);
    }
    
    /*public function fournisseur()
    {
      return $this->hasMany(fournisseur::class);
    }*/
}
    