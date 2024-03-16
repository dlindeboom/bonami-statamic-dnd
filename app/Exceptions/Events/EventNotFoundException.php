<?php

namespace App\Exceptions\Events;

use Exception;

class EventNotFoundException extends Exception
{
    public function __construct(
        private string $eventId,
        string $message = "Event not found",
        $code = 404,
        Exception $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getEventId(): int
    {
        return $this->eventId;
    }
}
