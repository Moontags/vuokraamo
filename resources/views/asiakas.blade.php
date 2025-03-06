<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuokraamo</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    @include('inc.header')
    <div class="container mx-auto p-4">
        <h3 class="text-2xl font-bold mb-4">Asiakastiedot</h3>
        <div class="mb-4">
            <a href="{{ route('asiakas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Lisää</a>
        </div>
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Etunimi</th>
                    <th class="border border-gray-300 px-4 py-2">Sukunimi</th>
                    <th class="border border-gray-300 px-4 py-2">Sähköposti</th>
                    <th class="border border-gray-300 px-4 py-2">Toiminto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asiakkaat as $asiakas)
                @dd($asiakkaat)
                    <tr class="bg-white">
                        <td class="border border-gray-300 px-4 py-2">{{ $asiakas->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $asiakas->etunimi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $asiakas->sukunimi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $asiakas->sahkoposti }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex gap-2">
                                <a href="{{ route('asiakas.asiakas.show', ['asiakas' => $asiakas->id]) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Näytä</a>
                                <a href="{{ route('asiakas.asiakas.edit', $asiakas->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Päivitä</a>
                                <form action="{{ route('asiakas.destroy', $asiakas->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Oletko varma?')">Poista</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="resources/css/app.css"></script>
</body>
</html>
