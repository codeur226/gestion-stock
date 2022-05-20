<?php

namespace Database\Seeders;
use App\Models\departement;
use App\Models\user;
use App\Models\Direction;
use App\Models\roles;
use App\Models\permissions;
use App\Models\Commande;
use App\Models\LigneCommande;
use App\Models\Materiel;
use App\Models\ProprieteMateriel;
use App\Models\users_Permissions;
use App\Models\Fournisseur;
use App\Models\users_roles;
use App\Models\destination;
use App\Models\MaterielPropriete;

use App\Models\entree;
use App\Models\sortie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        //$this->call(departementSeeder::class);
        //user::factory(30)->create();
        //Commande::factory(10)->create();
        MaterielPropriete::factory(10)->create();
        LigneCommande::factory(10)->create();
        //Fournisseur::factory(10)->create();
        //materiel::factory(10)->create();
        //$this->call(categorieSeeder::class);
        //$this->call(destinationSeeder::class);
        //destination::factory(4)->create();
         $this->call(rolesSeeder::class);
        //departement::factory(4)->create();
        Commande::factory(10)->create();
        //direction::factory(4)->create();
        //user::factory(10)->create();
        //roles::factory(2)->create();
        //permissions::factory(10)->create();
        $this->call(PermissionsSeeder::class);
        //users_permissions::factory(10)->create();

        $this->call(UserSeeder::class);
        
         $this->call(directionSeeder::class);
        $this->call(departementSeeder::class);

        //entree::factory(10)->create();
        //sortie::factory(10)->create();
        
        //users_roles::factory()->create();


      
        //Attribut les roles au differents utilisateurs
        /*User::find(1)->roles()->attach(1);
        User::find(2)->roles()->attach(2);
        User::find(3)->roles()->attach(3);
        User::find(4)->roles()->attach(4);*/
       
    }
}
