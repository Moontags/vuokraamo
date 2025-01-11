<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tuotteen tiedot</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="min-h-screen flex flex-col">
    @include('inc.header') <!-- Headerin sisällytys -->

    <main class="flex-grow flex justify-center items-center">
        <div class="bg-white p-8 rounded shadow-sm max-w-md w-full">
            <h2 class="text-2xl font-bold mb-4 text-center">Tuotteen tiedot</h2>
            <div class="mb-4">
                <p class="mb-2"><strong>Nimi:</strong> {{ $tuote->nimi }}</p>
                <p class="mb-2"><strong>Kuvaus:</strong> {{ $tuote->kuvaus }}</p>
                <p class="mb-2"><strong>Hinta:</strong> {{ number_format($tuote->hinta, 2) }} €</p>
                <p class="mb-2"><strong>Kappalemäärä:</strong> {{ $tuote->kpl }}</p>
                <div class="mb-4">
                    <p><strong>Kuva:</strong></p>
                    <img src="{{ asset('storage/' . $tuote->kuva) }}" alt="Tuotekuva" class="w-full rounded shadow-md">
                </div>
            </div>
            <a href="{{ route('tuote.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded block text-center">Takaisin</a>
        </div>
    </main>

    @include('inc.footer') <!-- Footerin sisällytys -->
</body>
</html>
