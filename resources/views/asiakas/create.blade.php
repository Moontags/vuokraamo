<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lisää uusi asiakas</title>
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

    <div class="container mx-auto py-8 flex-grow max-w-4xl">
        <h1 class="text-2xl font-bold mb-4 text-white text-center">Lisää uusi asiakas</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('asiakas.store') }}" method="POST" class="bg-black bg-opacity-50 p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="etunimi" class="block text-white font-bold">Etunimi:</label>
                <input type="text" name="etunimi" id="etunimi" value="{{ old('etunimi') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="sukunimi" class="block text-white font-bold">Sukunimi:</label>
                <input type="text" name="sukunimi" id="sukunimi" value="{{ old('sukunimi') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="sahkoposti" class="block text-white font-bold">Sähköposti:</label>
                <input type="email" name="sahkoposti" id="sahkoposti" value="{{ old('sahkoposti') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="lahiosoite" class="block text-white font-bold">Lähiosoite:</label>
                <input type="text" name="lahiosoite" id="lahiosoite" value="{{ old('lahiosoite') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="postinumero" class="block text-white font-bold">Postinumero:</label>
                <input type="text" name="postinumero" id="postinumero" value="{{ old('postinumero') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="postitoimipaikka" class="block text-white font-bold">Postitoimipaikka:</label>
                <input type="text" name="postitoimipaikka" id="postitoimipaikka" value="{{ old('postitoimipaikka') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="puhelin" class="block text-white font-bold">Puhelin:</label>
                <input type="text" name="puhelin" id="puhelin" value="{{ old('puhelin') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <div class="flex justify-between mt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-400">Tallenna</button>
                <a href="{{ route('asiakas.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">Peruuta</a>
            </div>
        </form>
    </div>

    @include('inc.footer')
</body>
</html>
