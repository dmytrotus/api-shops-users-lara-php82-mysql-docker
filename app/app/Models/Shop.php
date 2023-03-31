<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Events\Shop\ShopCreatedEvent;
use App\Events\Shop\ShopUpdatedEvent;
use App\Events\Shop\ShopDeletedEvent;
use App\Facades\Weather;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'latitude', 'longitude'];

    /**
     * Get the products for the shop.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    protected $dispatchesEvents = [
        'created' => ShopCreatedEvent::class,
        'updated' => ShopUpdatedEvent::class,
        'deleted' => ShopDeletedEvent::class,
    ];

    public function weather()
    {
        return Weather::get($this->latitude, $this->longitude);
    }
}
