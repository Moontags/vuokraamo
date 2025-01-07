<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asiakkaan tiedot</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    @include('inc.header')

    <div class="container mx-auto py-8 flex-grow">
        <h1 class="text-3xl font-bold mb-6">Asiakkaan tiedot</h1>
        <div class="bg-white p-6 rounded shadow-md">
            <p><strong>ID:</strong> {{ $asiakas->id }}</p>
            <p><strong>Etunimi:</strong> {{ $asiakas->etunimi }}</p>
            <p><strong>Sukunimi:</strong> {{ $asiakas->sukunimi }}</p>
            <p><strong>Sähköposti:</strong> {{ $asiakas->sahkoposti }}</p>
            <p><strong>Lähiosoite:</strong> {{ $asiakas->lahiosoite }}</p>
            <p><strong>Postinumero:</strong> {{ $asiakas->postinumero }}</p>
            <p><strong>Postitoimipaikka:</strong> {{ $asiakas->postitoimipaikka }}</p>
            <p><strong>Puhelin:</strong> {{ $asiakas->puhelin }}</p>
        </div>
        <div class="mt-4">
            <a href="{{ route('asiakas.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Takaisin</a>
        </div>
    </div>

    @include('inc.footer')
</body>
</html>
