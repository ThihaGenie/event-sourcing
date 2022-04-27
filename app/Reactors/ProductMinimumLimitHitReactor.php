<?php

namespace App\Reactors;

use App\Models\Product;
use App\StorableEvents\Product\ProductUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class ProductMinimumLimitHitReactor extends Reactor implements ShouldQueue
{
    public function onProductUpdated(ProductUpdated $event)
    {
        if($event->productUpdateAttributes['unit_count'] > 10) {
            return;
        }
        $product = Product::uuid($event->productUuid);
        Log::alert("Mail Sent");
    }
}
