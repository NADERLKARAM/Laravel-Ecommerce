<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = [
            [
                'name' => 'mobile1',
                'description' => 'Description for mobile1',
                'price' => 29.99,
                'quantity' => 100,
                'category_id' => 3,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'mobile2',
                'description' => 'Description for mobile2',
                'price' => 49.99,
                'quantity' => 50,
                'category_id' => 3,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'mobile3',
                'description' => 'Description for mobile3',
                'price' => 39.99,
                'quantity' => 75,
                'category_id' => 3,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'mobile4',
                'description' => 'Description for mobile4',
                'price' => 19.99,
                'quantity' => 120,
                'category_id' => 3,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'mobile5',
                'description' => 'Description for mobile5',
                'price' => 59.99,
                'quantity' => 80,
                'category_id' => 3,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'mobile6',
                'description' => 'Description for mobile6',
                'price' => 34.99,
                'quantity' => 60,
                'category_id' => 3,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'mobile7',
                'description' => 'Description for mobile7',
                'price' => 44.99,
                'quantity' => 90,
                'category_id' => 3,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'mobile8',
                'description' => 'Description for mobile8',
                'price' => 24.99,
                'quantity' => 110,
                'category_id' => 3,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'mobile9',
                'description' => 'Description for mobile9',
                'price' => 54.99,
                'quantity' => 70,
                'category_id' => 3,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'mobile10',
                'description' => 'Description for mobile10',
                'price' => 29.99,
                'quantity' => 85,
                'category_id' => 3,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
        ];

        DB::table('products')->insert($products);
    }
}