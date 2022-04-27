<?php

namespace App\Projectors;

use App\Models\User;
use App\StorableEvents\User\UserCreated;
use App\StorableEvents\User\UserDeleted;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class UserProjector extends Projector
{
    public function onUserCreated(UserCreated $event)
    {
        User::create($event->userAttributes);
    }

    public function onUserDeleted(UserDeleted $event) {
        User::uuid($event->userUuid)->delete();
    }
}
