<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array {
        
        return [
            'nome' => $this->faker->word,
            'valor' => $this->faker->randomFloat(2, 1, 1000),
            'quantidade' => $this->faker->numberBetween(1, 100),
            'preco' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
