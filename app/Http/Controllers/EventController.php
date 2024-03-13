<?php

namespace App\Http\Controllers;

use App\Models\EventSignup;
use Illuminate\Http\Request;
use Statamic\Facades\Entry;
use Statamic\Entries\Entry as StatamicEntry;

class EventController extends Controller
{
    public function signup(Request $request)
    {
        /** @var StatamicEntry|null $event */
        $event = Entry::query()
            ->where('collection', 'events')
            ->where('id', $request->event_id)
            ->first();

        if (!$event === null) {
            abort(404);
        }

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'about_you' => 'nullable|max:140',
        ]);

        $data['title'] = ucfirst($request->get('name'));

        Entry::make()
            ->collection('participants')
            ->data($data)
            ->save();

        return redirect($event->url())->with('message', 'Thanks for signing up!');
    }
}
