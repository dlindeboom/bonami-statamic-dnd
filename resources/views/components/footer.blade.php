<footer class="bg-gray-800 text-white py-6 mt-8">
    <div class="container mx-auto px-4 flex lg:justify-between flex-col lg:flex-row items-center">
        <div class="flex justify-center">
            @foreach(Statamic::tag('nav:socials') as $social)
                <a href="{{ $social['url'] }}" target="_blank" class="hover:text-gray-300 p-4">
                    <i class="fab {{ $social['icon'] }} fa-lg"></i>
                </a>
            @endforeach
        </div>
        <p class="lg:mt-0 text-center md:text-left">&copy; {{ now()->year }} Bonami SpelComputer Museum. All rights reserved.</p>
    </div>
</footer>
