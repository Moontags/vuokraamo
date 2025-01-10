<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muokkaa tuotetta</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Muokkaa tuotetta</h2>
        <form action="{{ route('tuote.update', $tuote->tuoteID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nimi" class="block text-gray-700 font-bold">Nimi</label>
                <input type="text" name="nimi" id="nimi" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->nimi }}" required>
            </div>
            <div class="mb-4">
                <label for="kuvaus" class="block text-gray-700 font-bold">Kuvaus</label>
                <textarea name="kuvaus" id="kuvaus" class="w-full border border-gray-300 px-4 py-2 rounded" required>{{ $tuote->kuvaus }}</textarea>
            </div>
            <div class="mb-4">
                <label for="kpl" class="block text-gray-700 font-bold">Kappalemäärä</label>
                <input type="number" name="kpl" id="kpl" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->kpl }}" required>
            </div>
            <div class="mb-4">
                <label for="hinta" class="block text-gray-700 font-bold">Vuokraushinta</label>
                <input type="number" step="0.01" name="hinta" id="hinta" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->vuokraushinta }}" required>
            </div>
            <div class="mb-4">
                <label for="kategoria" class="block text-gray-700 font-bold">Kategoria</label>
                <input type="text" name="kategoria" id="kategoria" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->kategoria }}" required>
            </div>
            <div class="mb-4">
                <label for="kuva" class="block text-gray-700 font-bold">Kuva</label>
                <input type="file" name="kuva" id="kuva" class="w-full border border-gray-300 px-4 py-2 rounded">
                @if ($tuote->kuva)
                    <p class="text-gray-600 mt-2">Nykyinen kuva:</p>
                    <img src="{{ Storage::url($tuote->kuva) }}" alt="Tuotekuva" class="w-full rounded shadow-md mt-2">
                @endif
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded w-full">Tallenna</button>
        </form>
        <a href="{{ route('tuote.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 block text-center">Takaisin</a>
    </div>
</body>
</html>
