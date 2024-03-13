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
                'name' => '1شنطة',
                'description' => 'Description for mobile1',
                'price' => 29.99,
                'quantity' => 100,
                'category_id' => 10,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'شنطة2',
                'description' => 'Description for mobile2',
                'price' => 49.99,
                'quantity' => 50,
                'category_id' => 10,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'شنطة3',
                'description' => 'Description for mobile3',
                'price' => 39.99,
                'quantity' => 75,
                'category_id' => 10,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'شنطة4',
                'description' => 'Description for mobile4',
                'price' => 19.99,
                'quantity' => 120,
                'category_id' => 10,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'شنطة5',
                'description' => 'Description for mobile5',
                'price' => 59.99,
                'quantity' => 80,
                'category_id' => 10,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
            [
                'name' => 'شنطة6',
                'description' => 'Description for mobile6',
                'price' => 34.99,
                'quantity' => 60,
                'category_id' => 10,
                'image' => 'product_images/65e42d7845100.jpg',
            ],
        ];

        DB::table('products')->insert($products);
    }
}
