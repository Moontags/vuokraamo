@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    @if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
       {{ session('success') }}
    </div>
    @endif
    <h1 class="text-3xl font-bold mb-6">Myyjät</h1>
    <a href="{{ route('myyja.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Lisää uusi myyjä</a>

    <table class="min-w-full bg-white border border-gray-300 text-center">
        <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Nimi</th>
                <th class="border border-gray-300 px-4 py-2">Käyttäjätunnus</th>
                <th class="border border-gray-300 px-4 py-2">Rooli</th>
                <th class="border border-gray-300 px-4 py-2">Toiminnot</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myyjats as $myyja)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $myyja->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $myyja->nimi }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $myyja->kayttajatunnus }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $myyja->rooli }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('myyja.show', ['myyja' => $myyja->myyjaID]) }}" class="text-blue-500">Katso</a> |
                    <a href="{{ route('myyja.edit', ['myyja' => $myyja->myyjaID]) }}" class="text-yellow-500">Muokkaa</a> |
                    <form action="{{ route('myyja.destroy', ['myyja' => $myyja->myyjaID]) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Haluatko varmasti poistaa tämän myyjän?')">Poista</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
