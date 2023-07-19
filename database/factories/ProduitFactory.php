<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom" => $this->faker->sentence(2, true),
            "description" => $this->faker->sentences(4, true),
            "prix"=>$this->faker->numberBetween(500,500000),
            "image"=> $this->faker->sentence(2, true),
            "quantite_stock"=>$this->faker->numberBetween(20,300)
        ];
    }
}
