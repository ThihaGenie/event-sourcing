<?php

namespace App\StorableEvents\Product;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ProductUpdated extends ShouldBeStored
{
    public $productUuid;
    public $productUpdateAttributes;
    public function __construct(string $productUuid, array $productUpdateAttributes)
    {
        $this->productUuid = $productUuid;
        $this->productUpdateAttributes = $productUpdateAttributes;
    }
}
