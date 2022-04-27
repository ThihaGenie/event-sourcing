<?php

namespace App\StorableEvents\Product;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ProductDeleted extends ShouldBeStored
{
    public $productUuid;

    public function __construct(string $productUuid)
    {
        $this->productUuid = $productUuid;
    }
}
