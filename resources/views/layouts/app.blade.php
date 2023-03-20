<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Fireshop') }}</title>

    <!-- CDN Bunny Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=baumans:400" rel="stylesheet" />

    <!-- CDN google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
          rel="stylesheet">

    <!-- Scripts -->
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

@include('layouts.navigation')

<body class="font-sans antialiased bg-black">
    <div x-data="{ cartOpen: false, isOpen: false }">
        <header class="rounded-b-lg border-yellow border-4">
            @include('layouts.navigation')
        </header>

        <main>
            {{ $slot }}
        </main>

        <footer>
            @include('layouts.footer')
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>

</html>
