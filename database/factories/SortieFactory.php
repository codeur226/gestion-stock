<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SortieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           /* "nom" => $this->faker->name,
            "imputable" =>  rand(1,4),
            "quantite_sortie" =>$this->faker->randomDigit,
            "date_sortie"=> $this->faker->dateTimeBetween("1980-01-01", "2022-12-30"),
            "destinations_id" => rand(1,4),
            "materiels_id" => rand(1, 4),
            "fournisseurs_id" => rand(1, 4)*/
        ];
    }
}
