<html>
<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body class="bg-white font-sans leading-normal tracking-normal">
        <header class="relative text-white text-center py-40 bg-no-repeat bg-top bg-cover border-b-4
        border-b-bonami-red border-t-8 border-t-bonami-blue"
                style="background-image: url('@yield('heroImage')');">

        </header>

        <div class="container mx-auto px-4 lg:max-w-7xl">
            @includeIf('components.message-bag')
            @yield('content')
        </div>
        @yield('scripts')

        <x-footer.menu :street="$address_info['street'] ?? ''"
                       :city="$address_info['city'] ?? ''"
                       :zip="$address_info['postal_code'] ?? ''"
                       :phone="$address_info['phone'] ?? ''"
                       :logoUrl="$address_info['logo'] ?? ''"
        />
    </body>
</html>



