<?php

declare(strict_types=1);

namespace App\Services\Events;

use App\Exceptions\Events\EventIsFullException;
use App\Exceptions\Events\EventNotFoundException;
use App\Exceptions\Events\ParticipantAlreadySignUp;
use Statamic\Entries\Entry as StatamicEntry;
use Statamic\Facades\Entry;

class EventService
{
    public function get(string $id): StatamicEntry
    {
        /** @var StatamicEntry|null $event */
        $event = Entry::query()
            ->where('collection', 'events')
            ->where('id', $id)
            ->first();

        if ($event === null) {
            throw new EventNotFoundException($id);
        }

        return $event;
    }

    /**
     * @param StatamicEntry $event
     * @param StatamicEntry $participant
     * @return StatamicEntry
     * @throws ParticipantAlreadySignUp
     * @throws EventIsFullException
     */
    public function addParticipant(StatamicEntry $event, StatamicEntry $participant): StatamicEntry
    {
        $participants = $event->get('participants', []);
        $maxSlots = $event->get('max_participants');

        if (count($participants) === $maxSlots) {
            throw new EventIsFullException();
        }

        if (in_array($participant->id, $participants)) {
            throw new ParticipantAlreadySignUp();
        }

        $participants[] = $participant->id;
        $event->set('participants', $participants);
        $totalParticipants = count($participants);

        $slotsLeft = $maxSlots - $totalParticipants;
        $event->set('slots_left', $slotsLeft);

        return  $this->save($event);
    }

    public function save(StatamicEntry $event): StatamicEntry
    {
        $event->save();

        return $event;
    }
}
