<?php

declare(strict_types=1);

namespace App\Exceptions\Events;

use Exception;

class EventNotFoundException extends Exception
{
    public function __construct(
        private string $eventId,
        string $message = "Event not found",
        int $code = 404,
        Exception $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getEventId(): string
    {
        return $this->eventId;
    }
}
