<?php namespace Saphira\Handlers;

use Saphira\Users\Events\UserHasRegistered;
use Saphira\Core\Events\EventListener;

class EmailNotifier extends EventListener {

    private $mailer;

    public function __construct()
    {

    }

    public function whenUserHasRegistered(UserHasRegistered $event)
    {
        Log::info('User Registered Event handler fired.');
    }
}