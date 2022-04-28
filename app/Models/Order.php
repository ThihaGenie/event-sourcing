<?php

namespace App\Models;

use App\StorableEvents\Order\OrderCreated;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products() {
        return $this->belongsToMany(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function createWithAttributes(array $attributes) {
        $attributes['uuid'] = (string) Uuid::uuid4();
    
        event(new OrderCreated($attributes));
        
        return static::uuid($attributes['uuid']);
    }

    public static function uuid(string $uuid): ?Order
    {
        return static::where('uuid', $uuid)->first();
    }
}
