<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of Product 1',
            'retail_price' => 10000,
            'wholesale_price' => 9000,
            'min_wholesale_qty' => 10,
            'quantity' => 100,
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description of Product 2',
            'retail_price' => 20000,
            'wholesale_price' => 18000,
            'min_wholesale_qty' => 10,
            'quantity' => 200,
        ]);

        Product::create([
            'name' => 'Product 3',
            'description' => 'Description of Product 3',
            'retail_price' => 30000,
            'wholesale_price' => 27000,
            'min_wholesale_qty' => 10,
            'quantity' => 300,
        ]);

        Product::create([
            'name' => 'Product 4',
            'description' => 'Description of Product 4',
            'retail_price' => 40000,
            'wholesale_price' => 36000,
            'min_wholesale_qty' => 10,
            'quantity' => 400,
        ]);

        Product::create([
            'name' => 'Product 5',
            'description' => 'Description of Product 5',
            'retail_price' => 50000,
            'wholesale_price' => 45000,
            'min_wholesale_qty' => 10,
            'quantity' => 500,
        ]);

        Product::factory(500)->create();
    }
}
