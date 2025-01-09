<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konevuokraus Tuotteet</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Konevuokraus Tuotteet</h1>
        @foreach ($ryhmitellytTuotteet as $kategoria => $tuotteet)
        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-4">{{ $kategoria }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($tuotteet as $tuote)
                <div class="bg-white border rounded p-4 shadow">
                    <h3 class="font-bold text-lg">{{ $tuote->nimi }}</h3>
                    <p class="text-sm text-gray-600">{{ $tuote->kuvaus }}</p>
                    <p class="mt-2 font-bold">Hinta: €{{ $tuote->vuokraushinta }}/päivä</p>
                    <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Vuokraa</button>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
