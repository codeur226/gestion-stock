<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("permissions")->insert([
            ["nom"=> "ajouter un materiel"],
            ["nom"=> "consulter un materiel"],
            ["nom"=> "editer un materiel"],
            ["nom"=> "supprimer un materiel"],

            ["nom"=> "ajouter un Fournisseur"],
            ["nom"=> "editer un Fournisseur"],
            ["nom"=> "supprimer un Fournisseur"],

            ["nom"=> "ajouter une Entree"],
            ["nom"=> "editer une Entree"],
            ["nom"=> "supprimer une Entree"],

            ["nom"=> "ajouter une Sortie"],
            ["nom"=> "editer une Sortie"],
            ["nom"=> "supprimer une Sortie"],
        ]);
    }
}
