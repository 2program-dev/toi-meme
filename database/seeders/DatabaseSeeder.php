<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => '2Program Srl',
            'email' => 'info@2program.it',
            'password' => bcrypt('admin'),
        ]);

        Product::factory()->count(5)->create();

        Customer::factory()
            ->count(15)
            ->has(Order::factory()->count(2), 'orders')
            ->create();
    }
}
