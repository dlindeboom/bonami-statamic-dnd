<html>
<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body class="bg-white font-sans leading-normal tracking-normal">

        <!-- Navbar, potentially with a dark blue background and white text -->
        <nav class="bg-bonami-blue text-white p-4">
            <div class="container mx-auto flex items-center justify-between">
                <div class="container mx-auto flex items-center justify-between">
        {{--            <a href="/events" class="text-white font-bold">Home</a>--}}
                </div>
            </div>
        </nav>

        <!-- Header with a vintage look, maybe with a grayscale background and red accents -->
        <header class="relative text-white text-center py-16 bg-no-repeat bg-top bg-cover border-b-4 border-bonami-red" style="background-image: url('@yield('heroImage')');">
            <div class="absolute inset-0 bg-gray-800 bg-opacity-50"></div>
            <div class="relative z-10">
                <h1 class="text-5xl font-bold mb-2">Dungeons & Dragons</h1>
                <p class="text-2xl mb-4">at Bonami</p>
                <p class="text-xl font-medium">{{ now()->setDay('24')->setMonth('3')->setHour('14')->setMinute('30')->setSecond('0')->format('F jS, Y H:i') }}</p>
                <div class="mt-4">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Join Adventure</button>
                    <button class="bg-transparent hover:bg-red-500 text-red-500 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded ml-4">
                        Discover More
                    </button>
                </div>
            </div>
        </header>

        <!-- Countdown section with a modern yet retro feel -->
        <section class="container mx-auto text-center py-6">
            <h2 class="text-3xl font-bold mb-8 text-bonami-blue">COUNTDOWN TO EVENT</h2>
            <div class="flex justify-center items-center space-x-8">
                <div class="p-4">
                    <p class="text-6xl font-bold text-bonami-red">10</p>
                    <p class="text-lg text-bonami-blue">DAYS</p>
                </div>
                <div class="p-4">
                    <p class="text-6xl font-bold text-bonami-red">22</p>
                    <p class="text-lg text-bonami-blue">HOURS</p>
                </div>
                <div class="p-4">
                    <p class="text-6xl font-bold text-bonami-red">55</p>
                    <p class="text-lg text-bonami-blue">MINUTES</p>
                </div>
                <div class="p-4">
                    <p class="text-6xl font-bold text-bonami-red">20</p>
                    <p class="text-lg text-bonami-blue">SECONDS</p>
                </div>
            </div>
        </section>

        <div class="container mx-auto px-4">
            @yield('content')
        </div>

        @yield('scripts')
    </body>
</html>
