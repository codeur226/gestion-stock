<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LigneCommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'QuantiteCommander' =>rand(0,1),
            'materiels_Id'=>rand(0,1),
            'commandes_Id'=>rand(0,1),
            
        ];
    }
}
