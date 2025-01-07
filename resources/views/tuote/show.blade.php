<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tuotteen tiedot</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Tuotteen tiedot</h2>
        <div class="mb-4">
            <p><strong>Nimi:</strong> {{ $tuote->nimi }}</p>
            <p><strong>Kuvaus:</strong> {{ $tuote->kuvaus }}</p>
            <p><strong>Kappalemäärä:</strong> {{ $tuote->kpl }}</p>
            <p><strong>Painoraja:</strong> {{ $tuote->painoraja }} kg</p>
            <p><strong>Kuva:</strong></p>
            <img src="{{ asset('storage/' . $tuote->kuva) }}" alt="Tuotekuva" class="w-full rounded shadow-md">
        </div>
        <a href="{{ route('tuote.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Takaisin</a>
    </div>
</body>
</html>
