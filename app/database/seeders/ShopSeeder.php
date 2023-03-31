<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Shop;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dispatcher = Shop::getEventDispatcher();
        // Remove Dispatcher
        Shop::unsetEventDispatcher();

        Shop::factory(24)->create();

        // Re-add Dispatcher
        Shop::setEventDispatcher($dispatcher);
    }
}
