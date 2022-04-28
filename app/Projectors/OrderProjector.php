<?php

namespace App\Projectors;

use App\Models\Order;
use App\StorableEvents\Order\OrderCreated;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class OrderProjector extends Projector
{
    public function onOrderCreated(OrderCreated $event)
    {
        $order = Order::create([
            "user_id"   => 1,
            "uuid"  => $event->orderAttributes["uuid"],
            "order_date"    => now(),
            "order_status"  => "processing"
        ]);
        foreach($event->orderAttributes['products'] as $product) {
            $order->products()->attach($product["product"]->id, [
                "ordered_quantity" => $product['ordered_quantity'], 
                "ordered_price" => $product['product']->unit_price
            ]);
        }
        
        
    }
}
