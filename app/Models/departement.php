<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departement extends Model
{

    use HasFactory;
    protected $table = 'departement';
    
    public function direction()
    {
       return $this->belongsTo(direction::class,"direction_Id","id");
    }

    public function users()
    {
       return $this->hasMany(users::class);
    }
}