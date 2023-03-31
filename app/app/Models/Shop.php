<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Events\ShopDeletedEvent;

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
        'deleted' => ShopDeletedEvent::class,

    ];
}
