<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;

class ShopTest extends TestCase
{
    use RefreshDatabase;

    private function user()
    {
        return User::first();
    }

    public function test_after_creating_shop_logs_appears_in_db(): void
    {
        $this->seed();
        $this->actingAs($this->user());

        $response = $this->post('/api/shop/store', [
            'name' => 'Shop Name',
            'address' => 'Shop Address',
            'latitude' => 10,
            'longitude' => 10
        ]);

        $this->assertDatabaseCount('logs', 1);
        $response->assertStatus(201);
    }

    public function test_after_updating_shop_logs_appears_in_db(): void
    {
        $this->seed();
        $this->actingAs($this->user());
        $shop = Shop::first();

        $response = $this->put('/api/shop/update/'.$shop->id, [
            'name' => 'New Shop Name',
            'address' => 'New Shop Address',
            'latitude' => 20,
            'longitude' => 20
        ]);

        $this->assertDatabaseCount('logs', 1);
        $response->assertOk();
    }

    public function test_after_deleting_shop_logs_appears_in_db(): void
    {
        $this->seed();
        $this->actingAs($this->user());
        $shop = Shop::first();

        $response = $this->delete('/api/shop/delete/'.$shop->id);

        $this->assertDatabaseCount('logs', 1);
        $response->assertOk();
    }
}
