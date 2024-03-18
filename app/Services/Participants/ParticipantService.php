<?php

declare(strict_types=1);

namespace App\Services\Participants;

use App\DataObjects\Participant;
use App\Exceptions\Events\EventIsFullException;
use App\Exceptions\Events\EventNotFoundException;
use App\Exceptions\Events\ParticipantAlreadySignUp;
use App\Services\Events\EventService;
use Statamic\Entries\Entry as StatamicEntry;
use Statamic\Facades\Entry;

class ParticipantService
{
    public function __construct(private EventService $eventService)
    {
    }

    /**
     * @param string $eventId
     * @param Participant $participantData
     * @return StatamicEntry
     * @throws EventNotFoundException
     * @throws ParticipantAlreadySignUp
     * @throws EventIsFullException
     */
    public function linkEvent(string $eventId, Participant $participantData): StatamicEntry
    {
        $event = $this->eventService->get($eventId);
        $participant = $this->getByEmail($participantData->getEmail());

        if ($participant !== null) {
            $this->eventService->addParticipant($event, $participant->id);
            $this->eventService->sendConformationMail($event, $participant->get(Participant::EMAIL));

            return $participant;
        }

        $participant = Entry::make()
            ->collection('participants')
            ->data($participantData->toArray());
        $participant = $this->save($participant);

        $this->eventService->addParticipant($event, $participant->id);
        $this->eventService->sendConformationMail($event, $participant->get(Participant::EMAIL));

        return $participant;
    }

    public function getByEmail(string $email): ?StatamicEntry
    {
        return Entry::query()
            ->where('collection', 'participants')
            ->where(Participant::EMAIL, $email)
            ->first();
    }

    public function save(StatamicEntry $participant): StatamicEntry
    {
        $participant->save();

        return $participant;
    }

    public function createParticipantObject(array $data): Participant
    {
        return app(Participant::class, ['data' => $data]);
    }
}
