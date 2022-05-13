<?php

namespace Database\Factories;
use App\Models\departement;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartementFactory extends Factory
{
    /**
     * Define the model's default state.
     *  
     *
     * @var string
     */
    protected $model = departement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "Libelle"=> $this->faker->lastName,
            'direction_Id'=>array_rand(["DME","DMI","DMS"],1),
            
        ];
    }
}
