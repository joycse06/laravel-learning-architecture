<?php namespace Saphira\Core\Events;

use Illuminate\Events\Dispatcher as LaravelDispatcher;
use Illuminate\Log\Writer;

class EventDispatcher {

    protected  $dispatcher;

    protected $log;

    function __construct(LaravelDispatcher $dispatcher, Writer $log){

        $this->dispatcher = $dispatcher;
        $this->log = $log;
    }

    public function dispatch(array $events)
    {
        foreach($events as $event)
        {
            $eventName = $this->getEventName($event);

            $this->dispatcher->fire($eventName, $event);

            $this->log->info("{$eventName} was fired");
        }

    }

    private function getEventName($event)
    {
        return str_replace("\\", '.',get_class($event));
    }


}