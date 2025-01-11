<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuokraamo</title>
    @vite('resources/css/app.css')
    <style>
        /* Inline CSS varmistamaan, että taustakuva toimii */
        body {
            background-image: url('/image/tools.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    @include('inc.header')

    <div class="flex-grow">
        <!-- Pääsisältö -->
        <div class="container mx-auto py-8 text-center">
            <h1 class="text-4xl font-bold text-white">Tervetuloa Vuokraamoon!</h1>
            <p class="mt-4 text-lg text-white">Tutustu valikoimaamme ja löydä juuri sinulle sopivat tuotteet.</p>
            <div class="mt-6">
                <a href="{{ route('tuote.index') }}" class="bg-transparent hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                    Katso tuotteet
                </a>
            </div>
        </div>
    </div>

    @include('inc.footer')
</body>

</html>
