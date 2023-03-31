<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    private function user()
    {
        return User::first();
    }

    public function test_after_creating_product_logs_appears_in_db(): void
    {
        $this->seed();
        $this->actingAs($this->user());

        $response = $this->post('/api/product/store', [
            'name' => 'Product Name',
            'ean' => 11111111111111111,
            'sku' => 11111111111111111,
            'shop_id' => 4
        ]);

        $this->assertDatabaseCount('logs', 1);
        $response->assertStatus(201);
    }

    public function test_after_updating_product_logs_appears_in_db(): void
    {
        $this->seed();
        $this->actingAs($this->user());
        $product = Product::first();

        $response = $this->put('/api/product/update/'.$product->id, [
            'name' => 'New Product Name',
            'ean' => 22222222222222222,
            'sku' => 22222222222222222,
            'shop_id' => 4
        ]);

        $this->assertDatabaseCount('logs', 1);
        $response->assertOk();
    }

    public function test_after_deleting_product_logs_appears_in_db(): void
    {
        $this->seed();
        $this->actingAs($this->user());
        $product = Product::first();

        $response = $this->delete('/api/product/delete/'.$product->id);

        $this->assertDatabaseCount('logs', 1);
        $response->assertOk();
    }
}
