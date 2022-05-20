<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("departement")->insert([
            ["libelle" => "DDM", "direction_Id" => "1"],
            ["libelle" => "DDRH", "direction_Id" => "2"],
        ]);
       
    }
}
