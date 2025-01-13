<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Vuokraamo')</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <style>
        body {
            background-image: url('/image/dark.jpg'); /* Polku taustakuvaan */
            background-size: cover; /* Kuva kattaa koko alueen */
            background-position: center; /* Kuva keskitetään */
            background-repeat: no-repeat; /* Ei toistuva kuva */
        }
    </style>
</head>
<body class="relative flex flex-col min-h-screen">
    @include('inc.header')

    <main class="relative flex-grow container mx-auto py-8 z-10 bg-transparent bg-opacity-60 rounded shadow-lg">
        @yield('content')
    </main>

    @include('inc.footer')
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
