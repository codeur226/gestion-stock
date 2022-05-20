<?php

namespace Database\Factories;
use App\Models\direction;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *  
     *
     * @var string
     */
   

    protected $model = direction::class;
    /**
     * Define the model's default state.
     *  
     *
     * @return array
     */
    public function definition()
    {
        return [
            "Nom" => $this->faker->LastName,
            "Libelle"=> array_rand(["DRH", "DFC"], 1),
            
        ];
    }
}
