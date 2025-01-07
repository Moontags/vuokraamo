<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Vuokraamo')</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    @include('inc.header')

    <main class="flex-grow container mx-auto py-8">
        @yield('content')
    </main>

    @include('inc.footer')
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
