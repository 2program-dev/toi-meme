<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderRow;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'customer_id' => Customer::all()->random(1)->first()?->id,
            'order_number' => $this->faker->unique()->randomNumber(),
            'subtotal' => 0,
            'total' => 0,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Order $order) {
            $orderRows = OrderRow::factory()->count(rand(1, 5))->make();

            $subtotal = 0;

            foreach ($orderRows as $orderRow) {
                $orderRow->order_id = $order->id;
                $orderRow->save();
                $subtotal += $orderRow->total;
            }

            $order->subtotal = $subtotal;
            $order->total = $subtotal;
            $order->save();
        });
    }
}
