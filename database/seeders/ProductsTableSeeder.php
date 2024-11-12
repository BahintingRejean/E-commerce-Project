<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [];
        for ($i = 1; $i <= 20; $i++) {
            $products[] = [
                'name' => 'Product ' . $i,
                'qty' => rand(1, 100),
                'price' => rand(10, 1000) / 10, // Random price between 1.0 and 100.0
                'description' => 'This is a description for Product ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert all products in a single query
        Product::insert($products);
    }
}
