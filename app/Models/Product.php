<?php

namespace App\Models;

use App\StorableEvents\Product\ProductCreated;
use App\StorableEvents\Product\ProductUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function createWithAttributes(array $attributes): Product {
        $attributes['uuid'] = (string) Uuid::uuid4();

        event(new ProductCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    public static function uuid(string $uuid): ?Product
    {
        return static::where('uuid', $uuid)->first();
    }
    
    public function orders() {
        return $this->belongsToMany(Order::class);
    }

    public function updateProduct($attributes) {
        event(new ProductUpdated($this->uuid, $attributes));
    }
}
