<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_permissions extends Model
{
    use HasFactory;
    protected $table = 'users_permissions';
   /*public function users(){
        return $this->hasMany(users::class);
    }
    public function permissions(){
        return $this->hasMany(permissions::class);
    }*/
}
