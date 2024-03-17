@extends('layouts.events')

@php
    $nextEvent = Statamic::tag('collection:events')
            ->queryScope('up_coming_event')
            ->orderBy('event_date')->fetch()->first();
    $nextEventDate = $nextEvent ? $nextEvent->event_date : null;
@endphp

@if($nextEvent !== null)
    @section('nextEventHeader')
            <h1 class="text-5xl font-bold mb-2">Dungeons & Dragons</h1>
            <p class="text-2xl">at Bonami</p>
            <p class="text-xl font-medium">Next adventure: {{ $nextEvent->title }}</p>
            <p class="text-xl font-medium">{{ $nextEvent->event_date->format('F jS, Y H:i') }}</p>
            <div class="mt-4 flex justify-center">
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                    onclick="document.dispatchEvent(new Event('open-signup'))">
                    Join Adventure
                </button>
                <a href="{{ $nextEvent->url() }}">
                    <button
                        type="button"
                        class="bg-transparent hover:bg-red-500 text-red-500 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded ml-4">
                        Discover More
                    </button>
                </a>
            </div>
    @endsection

    @section('modal')
        <x-models.event-signup :eventId="$nextEvent->id" />
    @endsection
@endif

@section('countdown')
    <x-events.countdown :nextEvent="$nextEvent"/>
@endsection

@section('title', $page->seo_title)

@section('content')
    <h1 class="text-2xl font-bold my-4 lg:mt-6">{{ $page->title }}</h1>

    <div class="container mx-auto py-4 lg:py-8">
        <!-- Tabs for switching between Upcoming and Previous Events -->
        <div class="flex border-b mb-4">
            <button class="px-4 py-2 text-bonami-blue border-b-2 border-bonami-blue focus:outline-none" id="upcoming-tab" onclick="switchTab('upcoming')">Upcoming Events</button>
            <button class="px-4 py-2 text-gray-600 border-bonami-blue focus:outline-none" id="previous-tab" onclick="switchTab('previous')">Previous Events</button>
        </div>

        <!-- Upcoming Events -->
        <div id="upcoming-events" class="space-y-4">
            @foreach (Statamic::tag('collection:events')
                ->queryScope('up_coming_event')
                ->orderBy('event_date') as $event)
                    <x-events.item :event="$event" />
            @endforeach
        </div>

        <!-- Previous Events -->
        <div id="previous-events" class="space-y-4 hidden">
            @foreach (Statamic::tag('collection:events')
                    ->queryScope('event_passed')
                    ->orderBy('event_date:desc') as $event)
                    <x-events.item :event="$event" />
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function switchTab(tab) {
            resetStyle();
            showTab(tab)
        }

        function showTab(tab) {
            document.getElementById(`${tab}-events`).style.display = 'block';
            document.getElementById(`${tab}-tab`).classList.replace('text-gray-600', 'text-bonami-blue');
            document.getElementById(`${tab}-tab`).classList.add('border-b-2')
        }

        function resetStyle() {
            document.getElementById('upcoming-events').style.display = 'none';
            document.getElementById('previous-events').style.display = 'none';
            document.getElementById('upcoming-tab').classList.replace('text-bonami-blue', 'text-gray-600');
            document.getElementById('previous-tab').classList.replace('text-bonami-blue', 'text-gray-600');
            document.getElementById('previous-tab').classList.remove('border-b-2');
            document.getElementById('upcoming-tab').classList.remove('border-b-2')
        }
    </script>
@endsection

@if($page->hero_banner)
    @section('heroImage'){{ $page->hero_banner->url() }}@endsection
@endif
