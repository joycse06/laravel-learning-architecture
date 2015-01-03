<?php namespace Saphira\Core\Events;

use App;

trait DispatchableTrait {

    public function dispatchEventsFor($entity)
    {
        return $this->getDispatcher()->dispatch($entity->releaseEvents());
    }

    public function getDispatcher()
    {
        return App::make('Saphira\Core\Events\EventDispatcher');
    }
}