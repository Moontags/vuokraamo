<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuokraamo</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
@if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
<body class="bg-gray-100 flex flex-col min-h-screen">
    @include('inc.header')

    <div class="container mx-auto py-8 text-center flex-grow">
        <h1 class="text-4xl font-bold text-gray-800">Tervetuloa!</h1>
        <p class="mt-4 text-lg text-gray-600">Tutustu valikoimaamme ja löydä juuri sinulle sopivat tuotteet.</p>
    </div>
    <div class="m-8 justify-end flex ">
        <a href="{{ route('tuote.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded mr-4">Katso tuotteet</a>

    </div>


    @include('inc.footer')
</body>
</html>
