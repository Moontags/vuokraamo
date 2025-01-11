<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Myyjän tiedot</title>
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
<body class="flex flex-col min-h-screen">
    @include('inc.header')

    <div class="container mx-auto py-8 flex-grow flex justify-center items-center">
        <div class="bg-white bg-opacity-75 p-8 rounded shadow-lg w-full max-w-md">
            <h1 class="text-3xl font-bold mb-6 text-center">Myyjän tiedot</h1>

            <div>
                <p class="mb-2"><strong>ID:</strong> {{ $myyja->myyjaID }}</p>
                <p class="mb-2"><strong>Nimi:</strong> {{ $myyja->nimi }}</p>
                <p class="mb-2"><strong>Käyttäjätunnus:</strong> {{ $myyja->kayttajatunnus }}</p>
                <p class="mb-2"><strong>Rooli:</strong> {{ $myyja->rooli }}</p>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('myyja.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">Takaisin</a>
            </div>
        </div>
    </div>

    @include('inc.footer')
</body>
</html>
