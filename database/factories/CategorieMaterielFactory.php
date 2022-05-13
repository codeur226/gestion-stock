<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorieMaterielFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /*"nom" => array_rand(["ELECTRICITE", "ELECTRONIQUE", "INFORMATIQUE", "MATERIEL DE BUREAU"], 1)*/
            'nom' => Str::random(10),
        ];
    }
}
