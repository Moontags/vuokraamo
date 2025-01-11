<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuokraamo - Asiakkaat</title>
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

    <div class="container mx-auto py-8 flex-grow mt-8">
        @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
           {{ session('success') }}
        </div>
        @endif

        <h1 class="text-3xl font-bold mb-6 text-white text-center">Asiakastiedot</h1>

        <a href="{{ route('asiakas.create') }}" class="bg-gray-700 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-gray-600">Lisää asiakas</a>

        <table class="min-w-full bg-black bg-opacity-75 border border-gray-800 text-center text-white">
            <thead class="bg-gray-800 bg-opacity-50">
                <tr>
                    <th class="border border-gray-700 px-4 py-2">ID</th>
                    <th class="border border-gray-700 px-4 py-2">Etunimi</th>
                    <th class="border border-gray-700 px-4 py-2">Sukunimi</th>
                    <th class="border border-gray-700 px-4 py-2">Sähköposti</th>
                    <th class="border border-gray-700 px-4 py-2">Toiminnot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asiakkaat as $asiakas)
                    <tr>
                        <td class="border border-gray-700 px-4 py-2">{{ $asiakas->id }}</td>
                        <td class="border border-gray-700 px-4 py-2">{{ $asiakas->etunimi }}</td>
                        <td class="border border-gray-700 px-4 py-2">{{ $asiakas->sukunimi }}</td>
                        <td class="border border-gray-700 px-4 py-2">{{ $asiakas->sahkoposti }}</td>
                        <td class="border border-gray-700 px-4 py-2">
                            <div class="flex justify-center space-x-2">
                                <!-- Näytä-nappi -->
                                <a href="{{ route('asiakas.show', $asiakas->id) }}"
                                   class="bg-gray-700 text-white px-3 py-1 rounded hover:bg-gray-600">Näytä</a>

                                <!-- Muokkaa-nappi -->
                                <a href="{{ route('asiakas.edit', $asiakas->id) }}"
                                   class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-100">Muokkaa</a>

                                <!-- Poista-nappi -->
                                <form action="{{ route('asiakas.destroy', $asiakas->id) }}"
                                      method="POST"
                                      class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-400"
                                            onclick="return confirm('Haluatko varmasti poistaa tämän asiakkaan?')">
                                        Poista
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('inc.footer')
</body>
</html>
