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

    <!--CSS-->
    {{-- <link rel="stylesheet" href="../../css/main.css"> --}}

    <!-- Scripts -->
    @vite('resources/css/app.css' , 'resources/js/app.js')
</head>

<body class="font-sans antialiased">
    <header class="bg-dark">
        @include('layouts.navigation');
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>

    </footer>
    

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>

</html>
