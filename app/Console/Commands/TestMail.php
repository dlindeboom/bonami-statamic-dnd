<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\DataObjects\Participant;
use App\Services\Events\EventService;
use App\Services\Participants\ParticipantService;
use Illuminate\Console\Command;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-mail {email} {event_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        /** @var ParticipantService $participantService */
        $participantService = app(ParticipantService::class);
        /** @var EventService $eventService */
        $eventService = app(EventService::class);

        $participant = $participantService->getByEmail($this->argument('email'));

        if ($participant === null) {
            $this->error('Participant not found');
            return;
        }

        $event = $eventService->get($this->argument('event_id'));

        $eventService->sendConformationMail($event, $participant->get(Participant::EMAIL));
    }
}
