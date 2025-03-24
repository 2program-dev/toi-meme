<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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

        return [
            'title' => $this->faker->colorName() . " " . $this->faker->word(),
            'slug' => $this->faker->slug(2),

            'category' => $this->faker->word(),
            'sku' => $this->faker->unique()->numerify('SKU-####'),

            'image' => $this->faker->imageUrl(),

            'price' => $this->faker->randomFloat(2, 20, 300),
            'sale_price' => $this->faker->randomFloat(2, 10, 200),
            'on_sale' => $this->faker->boolean(),

            'description' => $this->faker->text,
            'ingredients' => $this->faker->text,

            'focus_title' => $this->faker->sentence(),
            'focus_description' => $this->faker->text,
            'focus_image' => $this->faker->imageUrl(),
        ];
    }
}
