<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuokraamo</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    @include('inc.header')

    <div class="container mx-auto py-8 text-center flex-grow">
        <h1 class="text-4xl font-bold text-gray-800">Tervetuloa!</h1>
        <p class="mt-4 text-lg text-gray-600">Tutustu valikoimaamme ja löydä juuri sinulle sopivat tuotteet.</p>
    </div>

    @include('inc.footer')
</body>
</html>
