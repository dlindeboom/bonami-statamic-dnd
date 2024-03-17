@php
    /** @var \Statamic\Entries\Entry $event */
    $eventPassed = $event->event_date->isPast();
@endphp

<div class="p-4 mb-4 space-x-1 bg-white rounded shadow flex items-center justify-between">
    <a href="{{ $event->url }}">
        <div class="flex-1">
            <h3 class="text-lg font-bold">{{ $event->title }}</h3>
            <p class="text-sm">{{ $event->event_date }}</p>
            @if($event->dungeon_master)
                <p class="text-sm"><span class="font-bold">Dungeon Master:</span> {{ $event->dungeon_master->title }}</p>
            @endif
            @if(!$eventPassed)
                <p class="text-sm"><span class="font-bold">Slots Left:</span> {{ $event->max_participants - $event->participants->count() }}</p>
            @endif
        </div>
    </a>
    <div class="flex-shrink-0">
        <a href="{{ $event->url }}" class="text-bonami-blue hover:text-blue-700 flex items-center">
            <span>View details</span>
            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>
</div>
