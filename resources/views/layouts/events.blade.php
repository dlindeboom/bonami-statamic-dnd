<html>
<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body class="bg-white font-sans leading-normal tracking-normal">
        <nav class="bg-bonami-blue text-white p-4">
            <div class="container mx-auto flex items-center justify-between">
                <div class="container mx-auto flex items-center justify-between">
                </div>
            </div>
        </nav>

        <header class="relative text-white text-center py-16 bg-no-repeat bg-right bg-cover border-b-4 border-bonami-red" style="background-image: url('@yield('heroImage')');">
            <div class="absolute inset-0 bg-gray-800 bg-opacity-50"></div>
            <div class="relative z-10">
                @yield('nextEventHeader')
            </div>
        </header>

        @yield('countdown')

        <div class="container mx-auto px-4">
            @includeIf('components.message-bag')
            @yield('content')
        </div>

        @yield('modal')
        @yield('scripts')
    </body>
</html>
