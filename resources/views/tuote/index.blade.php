@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    @if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
       {{ session('success') }}
    </div>
    @endif
    <h1 class="text-3xl font-bold mb-6">Tuotetiedot</h1>
    <a href="{{ route('tuote.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Lisää tuote</a>

    <table class="min-w-full bg-white border border-gray-300 text-center">
        <thead class="bg-gray-200">
            <tr>

                <th class="border border-gray-300 px-4 py-2">Nimi</th>
                <th class="border border-gray-300 px-4 py-2">Kpl</th>
                <th class="border border-gray-300 px-4 py-2">Painoraja</th>
                <th class="border border-gray-300 px-4 py-2">Kuva</th>
                <th class="border border-gray-300 px-4 py-2">Toiminnot</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tuotes as $tuote)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $tuote->nimi }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $tuote->kpl }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $tuote->painoraja }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $tuote->kuva }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('tuote.show', ['tuote' => $tuote->tuoteID]) }}" class="text-blue-500">Katso</a> |
                        <a href="{{ route('tuote.edit', ['tuote' => $tuote->tuoteID]) }}" class="text-yellow-500">Päivitä</a> |
                        <form action="{{ route('tuote.destroy', ['tuote' => $tuote->tuoteID]) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Haluatko varmasti poistaa tämän tuotteen?')">Poista</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
