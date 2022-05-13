<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MaterielProprieteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "materiels_id" => rand(1,4),
            "propriete_materiels_id" => rand(0, 1),
            "valeur" => $this->faker->lastName
        ];
    }
}
