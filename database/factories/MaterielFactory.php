<?php

namespace Database\Factories;

use App\Models\materiel;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterielFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Materiel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /*"nom" => $this->faker->lastName,
            "noSerie" => $this->faker->swiftBicNumber,
            "imageUrl" => "images/imageplaceholder.png",
            "categorie_materiels_id" => rand(1,4),
            "estDisponible" => rand(0, 1),
            //"quantite_entree" => rand(1,4),
            //"date_entree"=> $this->faker->dateTimeBetween("1980-01-01", "2022-12-30"),
            "stock" => rand(100,999),
            //"fournisseurs_id" => rand(1,4),*/
           
        ];
    }
}
