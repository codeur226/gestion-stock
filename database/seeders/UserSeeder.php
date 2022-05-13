<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nom' => "Kabore",
            'prenom' => "Aboubacar",
            'email' => "admin@admin.com",
            'password' => Hash::make('password'),
            'sexe' => "1",
            'departement_Id' => "1",
            'telephone1' => "54015687",
            'telephone2' => "87139649",
        ]);
        //$user->assignRole('admin');
        User::find(1)->roles()->attach(2);
        User::find(1)->permissions()->attach(2);

        
        
    }
}
