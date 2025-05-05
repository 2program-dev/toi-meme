<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariant;
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

        $productName = $this->faker->colorName() . " " . $this->faker->word();
        $focusTitle = $this->faker->sentence();

        return [
            'title' => $productName,
            'slug' => $this->faker->slug(2),

            'category' => $this->faker->word(),
            'sku' => $this->faker->unique()->numerify('SKU-####'),

            'image' => '/products/product-placeholder.png',

            'price' => $this->faker->randomFloat(2, 20, 300),

            'description' => $this->faker->text,
            'ingredients' => $this->faker->text,

            'focus_title' => $focusTitle,
            'focus_description' => $this->faker->text,
            'focus_image' => 'https://placehold.co/2400x1984/FF5C36/FFFFFF?text=Focus',
        ];
    }

//    public function configure(): static
//    {
//        return $this->afterCreating(function (Product $product) {
//            $productVariants = ProductVariant::factory()->count(rand(1, 2))->make();
//
//            foreach ($productVariants as $productVariant) {
//                $productVariant->product_id = $product->id;
//                $productVariant->save();
//            }
//
//            $product->save();
//        });
//    }
}
