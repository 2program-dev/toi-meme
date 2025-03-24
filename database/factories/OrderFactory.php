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
        $customer = Customer::all()->random(1)->first();

        return [
            'customer_id' => $customer?->id,
            'order_number' => $this->faker->unique()->randomNumber(),
            'subtotal' => 0,
            'total' => 0,

            'customer_first_name' => $customer->first_name,
            'customer_last_name' => $customer->last_name,

            'customer_phone' => $customer->phone,

            'customer_company' => $customer->company,
            'customer_vat' => $customer->vat,
            'customer_fiscal_code' => $customer->fiscal_code,
            'customer_sdi' => $customer->sdi,

            'customer_billing_address' => $customer->billing_address,
            'customer_billing_city' => $customer->billing_city,
            'customer_billing_state' => $customer->billing_state,
            'customer_billing_zip' => $customer->billing_zip,
            'customer_billing_country' => $customer->billing_country,

            'customer_shipping_address' => $customer->shipping_address,
            'customer_shipping_city' => $customer->shipping_city,
            'customer_shipping_state' => $customer->shipping_state,
            'customer_shipping_zip' => $customer->shipping_zip,
            'customer_shipping_country' => $customer->shipping_country,
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
