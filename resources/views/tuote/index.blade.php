@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    @if (session('success'))
    <div class="bg-green-100 text-green-500 p-4 rounded mb-4">
       {{ session('success') }}
    </div>
    @endif
    <h1 class="text-3xl font-bold mb-6">Tuotetiedot</h1>
    <div class="flex justify-between items-center mb-4">
        <!-- Lisää tuote -nappi -->
        <a href="{{ route('tuote.create') }}" class="bg-green-400 text-white px-4 py-2 rounded">Lisää tuote</a>

        <!-- Vuokralla olevat -nappi -->
        <a href="{{ route('vuokraus.vuokralla') }}" class="bg-green-400 text-white px-4 py-2 rounded">Vuokralla olevat</a>
    </div>

    <table class="min-w-full bg-white border border-gray-100 text-center">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2">Nimi</th>
                <th class="border border-gray-300 px-4 py-2">Kpl</th>
                <th class="border border-gray-300 px-4 py-2">Kuva</th>
                <th class="border border-gray-300 px-4 py-2">Hinta</th>
                <th class="border border-gray-300 px-4 py-2">Toiminnot</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tuotes as $tuote)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $tuote->nimi }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $tuote->kpl }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($tuote->kuva)
                            <img src="{{ Storage::url($tuote->kuva) }}" alt="Tuotekuva" class="w-12 h-12 object-cover rounded">
                        @else
                            Ei kuvaa
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ number_format($tuote->hinta, 2) }} €</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <!-- Toimintonapit -->
                        <div class="flex justify-center space-x-2">
                            <!-- Katso-nappi -->
                            <a href="{{ route('tuote.show', ['tuote' => $tuote->tuoteID]) }}" class="bg-blue-400 text-white px-3 py-1 rounded">Katso</a>

                            <!-- Päivitä-nappi -->
                            <a href="{{ route('tuote.edit', ['tuote' => $tuote->tuoteID]) }}" class="bg-yellow-400 text-white px-3 py-1 rounded">Päivitä</a>

                            <!-- Poista-nappi -->
                            <form action="{{ route('tuote.destroy', ['tuote' => $tuote->tuoteID]) }}" method="POST" onsubmit="return confirm('Haluatko varmasti poistaa tämän tuotteen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Poista</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
