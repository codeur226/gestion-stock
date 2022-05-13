<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProprieteMaterielFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" => $this->faker->lastName,
            "categorie_materiels_id" => rand(1,4),
            "estObligatoire" => rand(0, 1)
        ];
    }
}
