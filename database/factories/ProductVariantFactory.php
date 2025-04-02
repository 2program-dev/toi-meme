<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => 1,
            'title' => $this->faker->colorName() . " " . $this->faker->word(),
            'unit_price' => $this->faker->randomFloat(2, 20, 300),
            'from_qty' => $this->faker->numberBetween(1, 50),
        ];
    }
}
