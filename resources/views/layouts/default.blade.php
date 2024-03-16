<html>
<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body class="bg-white font-sans leading-normal tracking-normal">
        <nav class="bg-bonami-blue text-white p-4">

        </nav>

        <header class="relative text-white text-center py-40 bg-no-repeat bg-top bg-cover border-b-4 border-bonami-red"
                style="background-image: url('@yield('heroImage')');">

        </header>

        <div class="container mx-auto px-4">
            @includeIf('components.message-bag')
            @yield('content')
        </div>
        @yield('scripts')
    </body>
</html>



