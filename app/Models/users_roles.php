<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_roles extends Model
{
    use HasFactory;
    protected $table = 'users_roles';
   /*public function users(){
        return $this->hasMany(users::class);
    }
    public function roles(){
        return $this->hasMany(roles::class);
    }*/
}
