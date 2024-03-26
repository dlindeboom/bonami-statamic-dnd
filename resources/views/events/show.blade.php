@extends('layouts.default')

@section('content')
    @php
        use Statamic\Entries\Entry;

        /** @var Entry $page */
        $slotsLeft = $page->max_participants - $page->participants->count();
    @endphp

    <div class="pt-4">
        <nav aria-label="breadcrumb" class="bg-white py-3">
            <ol class="list-reset flex">
                <li><a href="/events" class="text-bonami-blue hover:text-blue-700">Events</a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li class="text-gray-500">{{ $page->title }}</li>
            </ol>
        </nav>
        <div class="flex flex-col-reverse lg:flex-row lg:items-start lg:space-x-4">
            <!-- Main Column for Adventure Info and Mobile DM Info + Join Section -->
            <div class="flex-1">
                <!-- Adventure Info -->
                <div class="bg-white p-6 rounded-lg     shadow-lg mb-2">
                    <h2 class="text-2xl font-bold mb-4">{{ $page->title }}</h2>
                    <div class="prose prose-sm max-w-none">{!! $page->description !!}</div>
                </div>
            </div>

            <!-- Side Column for Desktop DM Info -->
            <div class="lg:flex flex-1 flex-col mb-4 gap-4">
                <!-- Join Event Section for Desktop -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <button
                        type="button"
                        onclick="document.dispatchEvent(new Event('open-signup'))"
                        class="bg-bonami-blue text-white font-bold py-2 px-4 rounded hover:bg-blue-800 disabled:opacity-50"
                        @if($slotsLeft <= 0) disabled @endif>
                        Join Now
                    </button>
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-bonami-blue"></i>
                            <p><strong>Slots Remaining:</strong> {{ $slotsLeft }}</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-user-shield mr-2 text-bonami-blue"></i>
                            <p><strong>Participants:</strong> {{ $page->participants->count() }}
                                /{{ $page->max_participants }}</p>
                        </div>

                        <h3 class="mt-4 mb-2 font-bold text-lg">Brave Adventurers Signed Up:</h3>

                        @foreach($page->participants as $participant)
                            <div class="bg-gray-100 p-4 rounded-lg">
                                @if($participant->hide_info)
                                    <p><strong>Name:</strong> Mysterious Adventurer</p>
                                    <p><strong>About Me:</strong> Dwelling in the shadows for now, this enigmatic figure
                                        vows to reveal themselves when the moment is right, their tale yet to be told.
                                    </p>
                                @else
                                    <p><strong>Name:</strong> {{ $participant->name }}</p>
                                    <p><strong>About Me:</strong> {{ $participant->about_you }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- DM Info -->
                @if($page->dungeon_master)
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold">Dungeon Master: {{ $page->dungeon_master->title }}</h3>

                        <div class="prose prose-sm max-w-none mt-2 dm-bio">
                            <span class="font-semibold text-gray-700">Bio:</span>
                            {!! $page->dungeon_master->bio !!}
                        </div>

                        <a href="{{ $page->dungeon_master->rules_url }}" target="_blank"
                           class="inline-flex items-center text-bonami-blue mt-2 hover:underline">
                            <i class="fas fa-book-open mr-1"></i>
                            View DM's Rules
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <x-models.event-signup :eventId="$page->id" />
@endsection

@if($page->hero_image)
    @section('heroImage'){{ $page->hero_image->url() }}@endsection
@endif
