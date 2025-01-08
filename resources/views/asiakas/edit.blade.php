<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muokkaa asiakasta</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Header -->
    @include('inc.header')

    <!-- Sisältö -->
    <div class="container mx-auto py-8 flex-grow">
        <h1 class="text-3xl font-bold mb-6">Muokkaa asiakasta</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Lomake -->
        <form action="{{ route('asiakas.update', $asiakas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="etunimi" class="block text-gray-700 font-bold">Etunimi:</label>
                <input type="text" name="etunimi" id="etunimi" value="{{ old('etunimi', $asiakas->etunimi) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="sukunimi" class="block text-gray-700 font-bold">Sukunimi:</label>
                <input type="text" name="sukunimi" id="sukunimi" value="{{ old('sukunimi', $asiakas->sukunimi) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="sahkoposti" class="block text-gray-700 font-bold">Sähköposti:</label>
                <input type="email" name="sahkoposti" id="sahkoposti" value="{{ old('sahkoposti', $asiakas->sahkoposti) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="lahiosoite" class="block text-gray-700 font-bold">Lähiosoite:</label>
                <input type="text" name="lahiosoite" id="lahiosoite" value="{{ old('lahiosoite', $asiakas->lahiosoite) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="postinumero" class="block text-gray-700 font-bold">Postinumero:</label>
                <input type="text" name="postinumero" id="postinumero" value="{{ old('postinumero', $asiakas->postinumero) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="postitoimipaikka" class="block text-gray-700 font-bold">Postitoimipaikka:</label>
                <input type="text" name="postitoimipaikka" id="postitoimipaikka" value="{{ old('postitoimipaikka', $asiakas->postitoimipaikka) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="puhelin" class="block text-gray-700 font-bold">Puhelin:</label>
                <input type="text" name="puhelin" id="puhelin" value="{{ old('puhelin', $asiakas->puhelin) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tallenna muutokset</button>
            <a href="{{ route('asiakas.index') }}" class="text-gray-500 ml-4">Peruuta</a>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-white shadow mt-auto">
        <div class="container mx-auto py-4 text-center text-gray-600">
            &copy; {{ date('Y') }} Vuokraamo. Kaikki oikeudet pidätetään.
        </div>
    </footer>
</body>
</html>
