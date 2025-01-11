<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuokraamo - Asiakkaat</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">
    @include('inc.header')

    <div class="container mx-auto py-8 flex-grow mt-8">
        @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
           {{ session('success') }}
        </div>
        @endif

        <h1 class="text-3xl font-bold mb-6">Asiakastiedot</h1>

        <a href="{{ route('asiakas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Lisää asiakas</a>

        <table class="min-w-full bg-white border border-gray-300 text-center">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Etunimi</th>
                    <th class="border border-gray-300 px-4 py-2">Sukunimi</th>
                    <th class="border border-gray-300 px-4 py-2">Sähköposti</th>
                    <th class="border border-gray-300 px-4 py-2">Toiminnot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asiakkaat as $asiakas)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $asiakas->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $asiakas->etunimi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $asiakas->sukunimi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $asiakas->sahkoposti }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex justify-center space-x-2">
                                <!-- Näytä-nappi -->
                                <a href="{{ route('asiakas.show', $asiakas->id) }}"
                                   class="bg-blue-500 text-white px-3 py-1 rounded">Näytä</a>

                                <!-- Muokkaa-nappi -->
                                <a href="{{ route('asiakas.edit', $asiakas->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded">Muokkaa</a>

                                <!-- Poista-nappi -->
                                <form action="{{ route('asiakas.destroy', $asiakas->id) }}"
                                      method="POST"
                                      class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded"
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
