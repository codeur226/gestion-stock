<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class directionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("direction")->insert([
            ["nom" => "Direction des Systèmes Applicatifs", "Libelle" => "DSA"],
            ["nom" => "Direction des Ressources Humaines", "Libelle" => "DRH"],
        ]);

       
    }
}
