<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    protected $table = 'permissions';
    use HasFactory;

    
    public function users(){
        return $this->belongsToMany(users::class,"users_permissions","permissions_id","users_id");
    }
    
}
