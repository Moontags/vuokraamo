<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muokkaa asiakasta</title>
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

    <!-- Pääsisältö -->
    <div class="container mx-auto py-8 flex-grow max-w-4xl">
        <h1 class="text-3xl font-bold mb-6 text-white text-center">Muokkaa asiakasta</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('asiakas.update', $asiakas->id) }}" method="POST" class="bg-black bg-opacity-50 p-6 rounded shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="etunimi" class="block text-white font-bold">Etunimi:</label>
                <input type="text" name="etunimi" id="etunimi" value="{{ old('etunimi', $asiakas->etunimi) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="sukunimi" class="block text-white font-bold">Sukunimi:</label>
                <input type="text" name="sukunimi" id="sukunimi" value="{{ old('sukunimi', $asiakas->sukunimi) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="sahkoposti" class="block text-white font-bold">Sähköposti:</label>
                <input type="email" name="sahkoposti" id="sahkoposti" value="{{ old('sahkoposti', $asiakas->sahkoposti) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="lahiosoite" class="block text-white font-bold">Lähiosoite:</label>
                <input type="text" name="lahiosoite" id="lahiosoite" value="{{ old('lahiosoite', $asiakas->lahiosoite) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="postinumero" class="block text-white font-bold">Postinumero:</label>
                <input type="text" name="postinumero" id="postinumero" value="{{ old('postinumero', $asiakas->postinumero) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="postitoimipaikka" class="block text-white font-bold">Postitoimipaikka:</label>
                <input type="text" name="postitoimipaikka" id="postitoimipaikka" value="{{ old('postitoimipaikka', $asiakas->postitoimipaikka) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="puhelin" class="block text-white font-bold">Puhelin:</label>
                <input type="text" name="puhelin" id="puhelin" value="{{ old('puhelin', $asiakas->puhelin) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <div class="flex justify-between mt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-400">Tallenna muutokset</button>
                <a href="{{ route('asiakas.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">Peruuta</a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white text-center py-4 opacity-75">
        <div class="container mx-auto">
            &copy; {{ date('Y') }} Vuokraamo. Kaikki oikeudet pidätetään.
        </div>
    </footer>
</body>
</html>
