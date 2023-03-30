<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (config('app.SEEDED_PRODUCTS_COUNT') > 100) {
            Product::factory(config('app.SEEDED_PRODUCTS_COUNT'))->create();
        } else {
            Product::factory(100)->create();
        }
    }
}