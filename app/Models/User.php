<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'departement_Id',
        'telephone1',
        'telephone2',
        'password',
        /*'photo'*/
        'sexe',
        'fonction',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function departement(){
        return $this->belongsTo(departement::class, "departement_Id","Id");
    }
    
    public function roles(){
        return $this->belongsToMany(roles::class,"users_roles","users_id","roles_id");
    }

    public function permissions(){
        return $this->belongsToMany(permissions::class,"users_permissions","users_id","permissions_id");
    }

    public function hasRole($role){
        return $this->roles()->where("nom",$role)->first()!=null;
    }
    public function hasAnyRole($roles){
        return $this->roles()->whereIn("nom",$roles)->first()!=null;
    }
    
    public function getAllRoleNamesAttribute(){
        return $this->roles->implode("nom", ' | ');
    }

}
