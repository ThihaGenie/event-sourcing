<?php

namespace App\Projectors;

use App\Models\Product;
use App\StorableEvents\Product\ProductCreated;
use App\StorableEvents\Product\ProductDeleted;
use App\StorableEvents\Product\ProductUpdated;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class ProductProjector extends Projector
{
    public function onProductCreated(ProductCreated $event)
    {
        Product::create($event->productAttributes);
    }
    public function onProductDeleted(ProductDeleted $event) {
        Product::uuid($event->productUuid)->delete();
    }
    public function onProductUpdated(ProductUpdated $event) {
        $product = Product::uuid($event->productUuid);
        $product->update($event->productUpdateAttributes);
    }
}
