<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muokkaa tuotetta</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-image: url('/image/jeep1.jpg'); /* Päivitä polku tarpeen mukaan */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    @include('inc.header')

    <main class="flex-grow flex justify-center items-center">
        <div class="bg-black bg-opacity-75 p-8 rounded shadow-md w-full max-w-3xl text-white">
            <h2 class="text-3xl font-bold mb-6 text-center">Muokkaa tuotetta</h2>
            <div class="flex flex-col md:flex-row">
                <!-- Lomakekentät vasemmalla -->
                <div class="md:w-1/2 md:pr-6">
                    <form action="{{ route('tuote.update', $tuote->tuoteID) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Nimi -->
                        <div class="mb-4">
                            <label for="nimi" class="block text-gray-300 font-bold">Nimi</label>
                            <input type="text" name="nimi" id="nimi" class="w-full border border-gray-500 px-4 py-2 rounded bg-gray-800 text-white" value="{{ $tuote->nimi }}" required>
                        </div>
                        <!-- Kuvaus -->
                        <div class="mb-4">
                            <label for="kuvaus" class="block text-gray-300 font-bold">Kuvaus</label>
                            <textarea name="kuvaus" id="kuvaus" class="w-full border border-gray-500 px-4 py-2 rounded bg-gray-800 text-white" required>{{ $tuote->kuvaus }}</textarea>
                        </div>
                        <!-- Kappalemäärä -->
                        <div class="mb-4">
                            <label for="kpl" class="block text-gray-300 font-bold">Kappalemäärä</label>
                            <input type="number" name="kpl" id="kpl" class="w-full border border-gray-500 px-4 py-2 rounded bg-gray-800 text-white" value="{{ $tuote->kpl }}" required>
                        </div>
                        <!-- Vuokraushinta -->
                        <div class="mb-4">
                            <label for="hinta" class="block text-gray-300 font-bold">Vuokraushinta</label>
                            <input type="number" step="0.01" name="hinta" id="hinta" class="w-full border border-gray-500 px-4 py-2 rounded bg-gray-800 text-white" value="{{ $tuote->hinta }}" required>
                        </div>
                        <!-- Kategoria -->
                        <div class="mb-4">
                            <label for="kategoria" class="block text-gray-300 font-bold">Kategoria</label>
                            <input type="text" name="kategoria" id="kategoria" class="w-full border border-gray-500 px-4 py-2 rounded bg-gray-800 text-white" value="{{ $tuote->kategoria }}" required>
                        </div>
                        <!-- Napit -->
                        <div class="flex justify-end space-x-4 md:hidden">
                            <a href="{{ route('tuote.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">Takaisin</a>
                        </div>
                </div>

                <!-- Tuotekuva oikealla -->
                <div class="md:w-1/2 md:pl-6 mt-6 md:mt-6 flex flex-col items-center">
                    @if ($tuote->kuva)
                        <img src="{{ asset('storage/' . $tuote->kuva) }}" alt="Tuotekuva" class="w-full rounded shadow-sm">
                    @endif
                    <div class="mb-4 mt-4">
                        <label for="kuva" class="block text-gray-300 font-bold mt-11">Uusi kuva</label>
                        <input type="file" name="kuva" id="kuva" class="w-full border border-gray-500 px-4 py-2 rounded bg-gray-800 text-white">
                    </div>
                </div>
            </div>

            <!-- Napit alapuolella -->
            <div class="flex justify-between space-x-4 mt-6">
                <a href="{{ route('tuote.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">Takaisin</a>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-400">Tallenna</button>
            </div>
        </form>
        </div>
    </main>

    @include('inc.footer')
</body>
</html>
