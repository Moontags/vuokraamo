<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kirjaudu sisään</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Kirjaudu sisään</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('kirjaudu.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="kayttajatunnus" class="block text-gray-700 font-bold">Käyttäjätunnus</label>
                <input type="text" name="kayttajatunnus" id="kayttajatunnus" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ old('kayttajatunnus') }}" required>
            </div>

            <div class="mb-4">
                <label for="salasana" class="block text-gray-700 font-bold">Salasana</label>
                <input type="password" name="salasana" id="salasana" class="w-full border border-gray-300 px-4 py-2 rounded" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Kirjaudu</button>
        </form>

    </div>
</body>
</html>
