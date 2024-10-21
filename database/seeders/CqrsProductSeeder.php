<?php

namespace Database\Seeders;

use App\Models\Cqrs\Product;
use Illuminate\Database\Seeder;

class CqrsProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Laptop', 'price' => 999.99],
            ['name' => 'Smartphone', 'price' => 599.99],
            ['name' => 'Headphones', 'price' => 149.99],
            ['name' => 'Tablet', 'price' => 399.99],
            ['name' => 'Smartwatch', 'price' => 249.99],
            ['name' => 'Camera', 'price' => 799.99],
            ['name' => 'Gaming Console', 'price' => 499.99],
            ['name' => 'Wireless Mouse', 'price' => 39.99],
            ['name' => 'External Hard Drive', 'price' => 89.99],
            ['name' => 'Bluetooth Speaker', 'price' => 79.99],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
