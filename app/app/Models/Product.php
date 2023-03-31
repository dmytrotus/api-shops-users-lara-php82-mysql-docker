<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\Product\ProductCreatedEvent;
use App\Events\Product\ProductUpdatedEvent;
use App\Events\Product\ProductDeletedEvent;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ean', 'sku', 'shop_id'];

    protected $dispatchesEvents = [
        'created' => ProductCreatedEvent::class,
        'updated' => ProductUpdatedEvent::class,
        'deleted' => ProductDeletedEvent::class,
    ];
}
