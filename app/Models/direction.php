<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class direction extends Model
{
    use HasFactory;
    protected $table = 'direction';// erreur je devrais declarer que c'est la table
    
    public function departement()
    {
       return $this->hasMany(departement::class);
    }

}
