@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    @if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
       {{ session('success') }}
    </div>
    @endif
    <h1 class="text-3xl font-bold mb-6  text-white">Myyjät</h1>
    <a href="{{ route('myyja.create') }}" class="bg-blue-400 text-white px-4 py-2 rounded mb-4 inline-block">Lisää uusi myyjä</a>

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
                <td class="border border-gray-300 px-4 py-2">{{ $myyja->myyjaID }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $myyja->nimi }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $myyja->kayttajatunnus }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $myyja->rooli }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <!-- Toimintonapit -->
                    <div class="flex justify-center space-x-2">
                        <!-- Katso-nappi -->
                        <a href="{{ route('myyja.show', ['myyja' => $myyja->myyjaID]) }}" class="bg-blue-400 text-white px-3 py-1 rounded">Katso</a>

                        <!-- Muokkaa-nappi -->
                        <a href="{{ route('myyja.edit', ['myyja' => $myyja->myyjaID]) }}" class="bg-yellow-400 text-white px-3 py-1 rounded">Muokkaa</a>

                        <!-- Poista-nappi -->
                        <form action="{{ route('myyja.destroy', ['myyja' => $myyja->myyjaID]) }}" method="POST" onsubmit="return confirm('Haluatko varmasti poistaa tämän myyjän?')">
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
