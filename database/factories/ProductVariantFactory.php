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
            'sku' => $this->faker->unique()->numerify('SKU-####'),
            'title' => $this->faker->colorName() . " " . $this->faker->word(),
            'icon' => $this->faker->imageUrl(),
        ];
    }
}
