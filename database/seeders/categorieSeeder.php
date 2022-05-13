<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table("categorie_materiels")->insert([
            ["nom"=> "ELECTRICITE"],
            ["nom"=> "ELECTRONIQUE"],
            ["nom"=> "INFORMATIQUE"],
            ["nom"=> "MATERIEL DE BUREAU"]

        ]);

        DB::table("propriete_materiels")->insert([
            ["nom" => "Marque", "categorie_materiels_id" => 1],
            ["nom" => "Kilometrage", "categorie_materiels_id" => 1],
            ["nom" => "Prix", "categorie_materiels" => 2],
            ["nom" => "Libelle", "categorie_materiels" => 2],
            ["nom" => "Marque", "categorie_materiels" => 3],
        ]);*/
    }
}
