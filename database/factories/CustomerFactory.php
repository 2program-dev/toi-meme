<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->count(1)->create()->first()->id,

            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),

            'phone' => $this->faker->phoneNumber(),

            'vat' => $this->faker->vat(),
            'fiscal_code' => $this->faker->taxId(),
            'sdi' => $this->faker->regexify('[A-Z0-9]{7}'),

            'billing_address' => $this->faker->streetAddress(),
            'billing_city' => $this->faker->city(),
            'billing_state' => $this->faker->stateAbbr(),
            'billing_zip' => $this->faker->postcode(),
            'billing_country' => $this->faker->country(),

            'shipping_address' => $this->faker->streetAddress(),
            'shipping_city' => $this->faker->city(),
            'shipping_state' => $this->faker->stateAbbr(),
            'shipping_zip' => $this->faker->postcode(),
            'shipping_country' => $this->faker->country(),
        ];
    }
}
