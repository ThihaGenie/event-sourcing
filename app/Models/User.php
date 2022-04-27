<?php

namespace App\Models;

use App\StorableEvents\User\UserCreated;
use App\StorableEvents\User\UserDeleted;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'address',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function createWithAttributes(array $attributes): User {
        $attributes['uuid'] = (string) Uuid::uuid4();

        /**
         * Trigger the event to create new user
         */
        event(new UserCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    public static function uuid(string $uuid): ?User
    {
        return static::where('uuid', $uuid)->first();
    }

    public function remove() {
        event(new UserDeleted($this->uuid));
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
