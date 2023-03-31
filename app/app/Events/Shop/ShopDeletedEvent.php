<?php

namespace App\Events\Shop;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Shop;
use App\Models\Log;

class ShopDeletedEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(Shop $shop)
    {
        optional($shop->products())->delete();

        Log::create([
            'user_id' => auth('sanctum')->user()->id,
            'model' => 'Shop',
            'event_type' => 'deleted',
        ]);
    }
}
