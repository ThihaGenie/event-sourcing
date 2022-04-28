<?php

namespace App\StorableEvents\Order;

use App\Models\User;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class OrderCreated extends ShouldBeStored
{
    public $orderAttributes;

    public function __construct($orderAttributes)
    {
        $this->orderAttributes = $orderAttributes;
    }
}
