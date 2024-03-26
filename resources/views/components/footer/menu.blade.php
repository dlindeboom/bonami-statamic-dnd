@php
/** @var string $street */
/** @var string $city */
/** @var string $zip */
/** @var string $phone */
/** @var string $logoUrl */
@endphp

<footer class="bg-colors-cool-gray-800 pt-6 mt-8 text-colors-cool-gray-500 shadow-lg">
    <div
        class="container mx-auto flex py-4 lg:flex-row lg:flex-nowrap md:flex-row md:flex-wrap flex-col justify-between px-4 lg:space-x-6 lg:max-w-4xl">
        <ul class="lg:w-1/4 w-full pb-2 lg:pb-0 text-center lg:text-left">
            <img src="{{ $logoUrl }}" alt="Bonami SpelComputer Museum" class="h-32 mx-auto lg:mx-auto mb-2">
            <li class="text-colors-cool-gray-100 font-bold pb-2">COMPUTER MUSEUM</li>
            <li class="bg-gradient-to-b h-0.5 from-colors-cool-gray-900 from-50% to-colors-cool-gray-700"></li>
            <li class="pt-2">{{ $street }}</li>
            <li>{{ $zip }} {{ $city }}</li>
            <li>Telefoon: {{ $phone }}</li>
        </ul>
        <ul class="lg:w-1/4 md:w-1/2 w-full pb-2 text-center md:text-left">
            <li class="text-colors-cool-gray-100 font-bold pb-2 lg:pb-0">Upcoming events</li>
            <li class="bg-gradient-to-b h-0.5 from-colors-cool-gray-900 from-50% to-colors-cool-gray-700"></li>
            @foreach (Statamic::tag('collection:events')
              ->queryScope('up_coming_event')
              ->orderBy('event_date') as $event)
                <x-footer.item :firstItem="$loop->first" :url="$event->url()" :title="$event->title" />
            @endforeach
        </ul>
        <ul class="lg:w-1/4 md:w-1/2 w-full pb-2 text-center md:text-left">
            <li class="text-colors-cool-gray-100 font-bold pb-2 lg:pb-0">Practical information</li>
            <li class="bg-gradient-to-b h-0.5 from-colors-cool-gray-900 from-50% to-colors-cool-gray-700"></li>
            @foreach(Statamic::tag('nav:practical_information') as $social)
                <x-footer.item :firstItem="$loop->first" :url="$social['url']" :title="$social['title']" />
            @endforeach
        </ul>
        <ul class="lg:w-1/4 md:w-1/2 w-full pb-2 text-center md:text-left">
            <li class="text-colors-cool-gray-100 font-bold pb-2 lg:pb-0">Social media</li>
            <li class="bg-gradient-to-b h-0.5 from-colors-cool-gray-900 from-50% to-colors-cool-gray-700"></li>
            @foreach(Statamic::tag('nav:socials') as $social)
                <x-footer.item :url="$social['url']" :icon="$social['icon']" :title="$social['title']" :firstItem="$loop->first" />
            @endforeach
        </ul>
    </div>
    <div class="mx-auto p-4 bg-colors-cool-gray-900 border-colors-cool-gray-700 border-t-2 text-left lg:text-center">
        &copy; {{ now()->year }} Bonami SpelComputer Museum. | Het Nederlands Instituut voor Games en Computers
    </div>
</footer>
