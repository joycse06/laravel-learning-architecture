<?php namespace Saphira\Core\Events;


/**
 * Class EventGenerator
 * @package Saphira\Core\Events
 */
trait EventGenerator {

    /**
     * Event storage
     * @var array
     */
    protected $pendingEvents = [];

    /**
     * Raise a new Event
     * @param $event
     */
    public function raise($event)
    {
        $this->pendingEvents[] = $event;
    }

    /**
     * Return and reset all pending Events
     * @return array
     */
    public function releaseEvents()
    {
        $events = $this->pendingEvents;

        $this->pendingEvents = [];

        return $events;
    }
}