<?php

namespace App\StorableEvents\User;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class UserDeleted extends ShouldBeStored
{
    public $userUuid;

    public function __construct(string $userUuid)
    {
        $this->userUuid = $userUuid;
    }
}
