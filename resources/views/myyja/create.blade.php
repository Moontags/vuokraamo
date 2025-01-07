<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lisää Myyjä</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    @include('inc.header')

    <div class="container mx-auto py-8 flex-grow">
        <h1 class="text-3xl font-bold mb-6">Lisää Myyjä</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('myyja.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="nimi" class="block text-gray-700 font-bold">Nimi:</label>
                <input type="text" name="nimi" id="nimi" value="{{ old('nimi') }}" class="w-full border border-gray-300 px-4 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="kayttajatunnus" class="block text-gray-700 font-bold">Käyttäjätunnus:</label>
                <input type="text" name="kayttajatunnus" id="kayttajatunnus" value="{{ old('kayttajatunnus') }}" class="w-full border border-gray-300 px-4 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="salasana" class="block text-gray-700 font-bold">Salasana:</label>
                <input type="password" name="salasana" id="salasana" class="w-full border border-gray-300 px-4 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="rooli" class="block text-gray-700 font-bold">Rooli:</label>
                <input type="text" name="rooli" id="rooli" value="{{ old('rooli') }}" class="w-full border border-gray-300 px-4 py-2 rounded" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tallenna</button>
            <a href="{{ route('myyja.index') }}" class="text-gray-500 ml-4">Peruuta</a>
        </form>
    </div>

    @include('inc.footer')
</body>
</html>
