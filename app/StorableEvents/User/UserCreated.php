<?php

namespace App\StorableEvents\User;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class UserCreated extends ShouldBeStored
{
    public $userAttributes;

    public function __construct(array $userAttributes)
    {
        $this->userAttributes = $userAttributes;
    }
}
