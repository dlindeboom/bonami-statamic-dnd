@extends('layouts.default')

@section('content')
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
            <div class="lg:flex flex-1 flex-col mb-4">
                <!-- DM Info -->
                @if($page->dungeon_master)
                    <div class="bg-white p-6 rounded-lg shadow-lg mb-4">
                        <h3 class="text-xl font-bold">Dungeon Master: {{ $page->dungeon_master->title }}</h3>

                        <div class="prose prose-sm max-w-none">
                            <span class="font-semibold text-gray-700">Bio:</span>{!! $page->dungeon_master->bio !!}
                        </div>

                        <a href="{{ $page->dungeon_master->rules_url }}" target="_blank" class="text-bonami-blue inline-block mt-2">View DM's Rules</a>
                    </div>
                @endif

                <!-- Join Event Section for Desktop -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <button class="bg-bonami-blue text-white font-bold py-2 px-4 rounded hover:bg-blue-700 disabled:opacity-50"
                            @if($page->slots_left <= 0) disabled @endif>
                        Join Now
                    </button>
                    <div class="mt-4">
                        <p><strong>Slots Remaining:</strong> {{ $page->slots_left }}</p>
                        <p><strong>Participants:</strong> {{ $page->participants }}/{{ $page->max_participants }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@if($page->hero_image)
    @section('heroImage'){{ $page->hero_image->url() }}@endsection
@endif
