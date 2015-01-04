<?php namespace Saphira\Users\Events;

use Saphira\Users\User;

class UserHasRegistered {

    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }
}