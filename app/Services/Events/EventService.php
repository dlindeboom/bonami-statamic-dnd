<?php

declare(strict_types=1);

namespace App\Services\Events;

use App\Exceptions\Events\EventIsFullException;
use App\Exceptions\Events\EventNotFoundException;
use App\Exceptions\Events\ParticipantAlreadySignUp;
use App\Mail\EventSignupConfirmation;
use Illuminate\Support\Facades\Mail;
use RuntimeException;
use Statamic\Entries\Entry as StatamicEntry;
use Statamic\Facades\Entry;
use Statamic\Facades\GlobalSet;

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
     * @param string $participantId
     * @return StatamicEntry
     * @throws EventIsFullException
     * @throws ParticipantAlreadySignUp
     * @throws RuntimeException
     */
    public function addParticipant(StatamicEntry $event, string $participantId): StatamicEntry
    {
        $participants = $event->get('participants', []);
        $maxSlots = $event->get('max_participants');

        if (count($participants) === $maxSlots) {
            throw new EventIsFullException();
        }

        if (in_array($participantId, $participants)) {
            throw new ParticipantAlreadySignUp();
        }

        $participants[] = $participantId;
        $event->set('participants', $participants);
        $totalParticipants = count($participants);

        $slotsLeft = $maxSlots - $totalParticipants;
        $event->set('slots_left', $slotsLeft);

        return $this->save($event);
    }

    /**
     * @param StatamicEntry $event
     * @param string $email
     * @return void
     */
    public function sendConformationMail(StatamicEntry $event, string $email): void
    {
        $set = GlobalSet::findByHandle('address_info');

        if ($set === null) {
            throw new RuntimeException('No address info found');
        }

        $addressInfo = $set->inDefaultSite();
        $addressInfo = [
            'name' => $addressInfo->get('name'),
            'logo_color' => 'storage/' . $addressInfo->get('logo_color'),
            'street' => $addressInfo->get('street'),
            'postal_code' => $addressInfo->get('postal_code'),
            'city' => $addressInfo->get('city'),
        ];

        Mail::to($email)->send(new EventSignupConfirmation($addressInfo, $event));
    }

    public function save(StatamicEntry $event): StatamicEntry
    {
        $event->save();

        return $event;
    }
}
