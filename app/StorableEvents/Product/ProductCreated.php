<?php

namespace App\StorableEvents\Product;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ProductCreated extends ShouldBeStored
{
    public $productAttributes;

    public function __construct(array $productAttributes)
    {
        $this->productAttributes = $productAttributes;
    }
}
