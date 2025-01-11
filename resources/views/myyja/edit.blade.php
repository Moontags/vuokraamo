<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muokkaa myyjää</title>
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
        <div class="bg-white bg-opacity-75 p-8 rounded shadow-lg w-full max-w-lg">
            <h1 class="text-3xl font-bold mb-6 text-center">Muokkaa myyjän tietoja</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('myyja.update', ['myyja' => $myyja->myyjaID]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nimi" class="block text-gray-700 font-bold">Nimi:</label>
                    <input type="text" name="nimi" id="nimi" value="{{ old('nimi', $myyja->nimi) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
                </div>

                <div class="mb-4">
                    <label for="kayttajatunnus" class="block text-gray-700 font-bold">Käyttäjätunnus:</label>
                    <input type="text" name="kayttajatunnus" id="kayttajatunnus" value="{{ old('kayttajatunnus', $myyja->kayttajatunnus) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
                </div>

                <div class="mb-4">
                    <label for="rooli" class="block text-gray-700 font-bold">Rooli:</label>
                    <input type="text" name="rooli" id="rooli" value="{{ old('rooli', $myyja->rooli) }}" class="w-full border border-gray-300 px-4 py-2 rounded">
                </div>

                <div class="mt-6 flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Päivitä</button>
                    <a href="{{ route('myyja.index') }}" class="text-gray-500 hover:text-gray-700">Peruuta</a>
                </div>
            </form>
        </div>
    </div>

    @include('inc.footer')
</body>
</html>
