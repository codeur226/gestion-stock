<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieMateriel extends Model
{
    use HasFactory;
    protected $table = 'categorie_materiels';
    protected $fillable = ['nom'];

    public function materiels(){
        return $this->hasMany(Materiel::class);
    }

    public function proprietes(){
        return $this->hasMany(ProprieteMateriel::class);
    }

}

