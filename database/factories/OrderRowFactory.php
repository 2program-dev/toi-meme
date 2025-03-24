<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderRow>
 */
class OrderRowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::all()->random(1)->first();

        $quantity = $this->faker->numberBetween(1, 5);
        $price = $product->price ?? $this->faker->randomFloat(2, 10, 100);
        $total = $quantity * $price;

        return [
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $price,
            'total' => $total,
        ];
    }
}
