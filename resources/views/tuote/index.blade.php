@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-2xl">
    @if (session('success'))
        <div class="bg-green-100 text-green-500 p-4 rounded mb-4">
           {{ session('success') }}
        </div>
    @endif
    <h1 class="text-3xl font-bold mb-6 text-white text-center">Vuokrattavat automme</h1>

    @if ($tuotes->count() > 0)
        <!-- Näytetään yksi tuote keskellä -->
        <div class="bg-black bg-opacity-75 shadow-lg rounded p-6 text-center">
            <img src="{{ Storage::url($tuotes[0]->kuva) }}" alt="{{ $tuotes[0]->nimi }}" class="w-85 h-64 object-contain rounded mb-4 mx-auto">

            <h3 class="text-2xl font-bold text-white">{{ $tuotes[0]->nimi }}</h3>
            <p class="text-gray-300 mt-2">{{ $tuotes[0]->kuvaus }}</p>
            <p class="text-lg font-semibold m-4 text-white">{{ number_format($tuotes[0]->hinta, 2) }} € / Vuorokausi</p>

            <a href="{{ route('vuokraus.create') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">
                Vuokraa
            </a>
        </div>

        <!-- Pagination nuolilla ja toimintonapeilla -->
        <div class="flex justify-around items-center mt-8 space-x-4">
            <!-- Edellinen -->
            @if ($tuotes->onFirstPage())
                <button class="bg-gray-700 text-white px-4 py-2 rounded opacity-50 cursor-not-allowed">
                    <i class="bi bi-arrow-left"></i> Edellinen
                </button>
            @else
                <a href="{{ $tuotes->previousPageUrl() }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">
                    <i class="bi bi-arrow-left"></i> Edellinen
                </a>
            @endif

            <!-- Toimintonapit -->
            <div class="flex space-x-4">
                <a href="{{ route('tuote.show', ['tuote' => $tuotes[0]->tuoteID]) }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">Katso</a>
                <a href="{{ route('tuote.edit', ['tuote' => $tuotes[0]->tuoteID]) }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">Päivitä</a>
                <form action="{{ route('tuote.destroy', ['tuote' => $tuotes[0]->tuoteID]) }}" method="POST" onsubmit="return confirm('Haluatko varmasti poistaa tämän tuotteen?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Poista</button>
                </form>
            </div>

            <!-- Seuraava -->
            @if ($tuotes->hasMorePages())
                <a href="{{ $tuotes->nextPageUrl() }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Seuraava <i class="bi bi-arrow-right"></i>
                </a>
            @else
                <button class="bg-gray-700 text-white px-4 py-2 rounded opacity-50 cursor-not-allowed">
                    Seuraava <i class="bi bi-arrow-right"></i>
                </button>
            @endif
        </div>
    @else
        <p class="text-white text-center">Ei tuotteita saatavilla.</p>
    @endif
</div>
@endsection
