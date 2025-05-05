<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    public $products = [
        [
            'title' => 'Bilanciata',
            'slug' => 'bilanciata',
            'category' => 'Bruciagrassi',
            'sku' => 'bilanciata',
            'image' => '/products/bilanciata-pack.jpg',
            'price' => '70.00',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'ingredients' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'focus_title' => 'Focus ingredienti',
            'focus_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'focus_image' => '/products/focus-placeholder.jpg',
            'variants' => [
                [
                    'product_id' => 0,
                    'title' => '13 confezioni da 30 flaconcini',
                    'unit_price' => '70.00',
                    'from_qty' => '13',
                ],
                [
                    'product_id' => 0,
                    'title' => '20 confezioni da 30 flaconcini',
                    'unit_price' => '63.00',
                    'from_qty' => '20',
                ],
                [
                    'product_id' => 0,
                    'title' => '33 confezioni da 30 flaconcini',
                    'unit_price' => '50.00',
                    'from_qty' => '33',
                ]
            ]
        ],
        [
            'title' => 'Depurata',
            'slug' => 'depurata',
            'category' => 'Drenante',
            'sku' => 'depurata',
            'image' => '/products/depurata-pack.jpg',
            'price' => '9.80',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'ingredients' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'focus_title' => 'Focus ingredienti',
            'focus_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'focus_image' => '/products/focus-placeholder.jpg',
            'variants' => [
                [
                    'product_id' => 0,
                    'title' => '220 confezioni da 30 bustine',
                    'unit_price' => '9.80',
                    'from_qty' => '220',
                ],
                [
                    'product_id' => 0,
                    'title' => '450 confezioni da 30 bustine',
                    'unit_price' => '9.50',
                    'from_qty' => '450',
                ],
                [
                    'product_id' => 0,
                    'title' => '670 confezioni da 30 bustine',
                    'unit_price' => '7.30',
                    'from_qty' => '670',
                ]
            ]
        ],
        [
            'title' => 'Energetica',
            'slug' => 'energetica',
            'category' => 'Performante',
            'sku' => 'energetica',
            'image' => '/products/energetica-pack.jpg',
            'price' => '70.00',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'ingredients' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'focus_title' => 'Focus ingredienti',
            'focus_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'focus_image' => '/products/focus-placeholder.jpg',
            'variants' => [
                [
                    'product_id' => 0,
                    'title' => '13 confezioni da 30 flaconcini',
                    'unit_price' => '70.00',
                    'from_qty' => '13',
                ],
                [
                    'product_id' => 0,
                    'title' => '20 confezioni da 30 flaconcini',
                    'unit_price' => '63.00',
                    'from_qty' => '20',
                ],
                [
                    'product_id' => 0,
                    'title' => '33 confezioni da 30 flaconcini',
                    'unit_price' => '50.00',
                    'from_qty' => '33',
                ]
            ]
        ],
        [
            'title' => 'Raggiante',
            'slug' => 'raggiante',
            'category' => 'Antiossidante',
            'sku' => 'raggiante',
            'image' => '/products/raggiante-pack.jpg',
            'price' => '30.00',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'ingredients' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'focus_title' => 'Focus ingredienti',
            'focus_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'focus_image' => '/products/focus-placeholder.jpg',
            'variants' => [
                [
                    'product_id' => 0,
                    'title' => '40 pezzi da 60 pilloliere',
                    'unit_price' => '30.00',
                    'from_qty' => '40',
                ],
                [
                    'product_id' => 0,
                    'title' => '60 pezzi da 60 pilloliere',
                    'unit_price' => '25.00',
                    'from_qty' => '60',
                ],
                [
                    'product_id' => 0,
                    'title' => '100 pezzi lotto completo',
                    'unit_price' => '20.00',
                    'from_qty' => '100',
                ]
            ]
        ],
        [
            'title' => 'Rinvigorita',
            'slug' => 'rinvigorita',
            'category' => 'Riequilibrante',
            'sku' => 'rinvigorita',
            'image' => '/products/rinvigorita-pack.jpg',
            'price' => '9.00',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'ingredients' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'focus_title' => 'Focus ingredienti',
            'focus_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'focus_image' => '/products/focus-placeholder.jpg',
            'variants' => [
                [
                    'product_id' => 0,
                    'title' => '220 confezioni da 30 bustine',
                    'unit_price' => '9.00',
                    'from_qty' => '220',
                ],
                [
                    'product_id' => 0,
                    'title' => '450 confezioni da 30 bustine',
                    'unit_price' => '8.50',
                    'from_qty' => '450',
                ],
                [
                    'product_id' => 0,
                    'title' => '670 confezioni da 30 bustine',
                    'unit_price' => '7.00',
                    'from_qty' => '670',
                ]
            ]
        ]
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => '2Program Srl',
            'email' => 'info@2program.it',
            'password' => Hash::make('admin'),
            'approved' => true,
            'remember_token' => Str::random(60),
            'role' => 'admin'
        ])->markEmailAsVerified();

        foreach ($this->products as $product) {
            $productCollection = collect($product);
            $productData = $productCollection->except('variants')->toArray();

            $productData['related_products'] = [(string)rand(1, 5), (string)rand(1, 5)];

            $createdProduct = Product::factory()->create(
                $productData
            );

            if ($createdProduct) {
                foreach ($productCollection->get('variants', []) as $variant) {
                    $variant['product_id'] = $createdProduct->id;
                    ProductVariant::factory()->create($variant);
                }
            }
        }

        Customer::factory()
            ->count(15)
            ->has(Order::factory()->count(2), 'orders')
            ->create();
    }
}
