<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        $shopsCount = config('app.SEEDED_SHOPS_COUNT');

        return [
            'name' => fake()->word(),
            'ean' => fake()->ean13(),
            'sku' => fake()->ean8(),
            'shop_id' => rand(1, $shopsCount)
        ];
    }
}
