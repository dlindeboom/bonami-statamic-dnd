<?php

namespace App\Http\Controllers;

use App\Exceptions\Events\EventIsFullException;
use App\Exceptions\Events\EventNotFoundException;
use App\Exceptions\Events\ParticipantAlreadySignUp;
use App\Models\EventSignup;
use App\Services\Participants\ParticipantService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(private readonly ParticipantService $participantService)
    {
    }

    public function signup(Request $request, string $eventId): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'about_you' => 'nullable|max:500',
            'hide_info' => 'nullable',
        ]); // This is a simplified version of the validation. The real one is more complex.

        try {
            $participant = $this->participantService->createParticipantObject($data);
            $this->participantService->linkEvent($eventId, $participant);
        } catch (EventNotFoundException $e) {
            return redirect(null, 404)->back()->withErrors(
                'The event you are trying to sign up for does not exist.'
            );
        } catch (ParticipantAlreadySignUp $e) {
            // We show the same message as if you have successfully signed up to avoid leaking information.
            // This might cause some confusion, but it's a security measure.
            return redirect()->back()->with('success', 'You have successfully signed up for the event!');
        } catch (EventIsFullException $e) {
            return redirect()->back()->withErrors(
                'The event is full.'
            );
        }

        return redirect()->back()->with('success', 'You have successfully signed up for the event!');
    }
}
