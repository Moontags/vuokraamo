@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-3xl">
    @if (session('success'))
        <div class="bg-green-100 text-green-500 p-4 rounded mb-2">
           {{ session('success') }}
        </div>
    @endif
    <h1 class="text-3xl font-bold mb-6 text-white text-center">Vuokra automme</h1>

    @if ($tuotes->count() > 0)
        <!-- Näytetään yksi tuote keskellä -->
        <div class="bg-white bg-opacity-95 shadow-lg rounded p-6 text-center">
            <img src="{{ Storage::url($tuotes[0]->kuva) }}" alt="{{ $tuotes[0]->nimi }}" class="w-full h-80 object-contain rounded mb-6 mx-auto">

            <h3 class="text-2xl font-bold mb-4 drop-shadow-lg">{{ $tuotes[0]->nimi }}</h3>

            <p class="mb-4 drop-shadow-sm">{{ $tuotes[0]->kuvaus }}</p>

            <!-- Flex-asettelu hinnalle ja napille -->
            <div class="flex justify-end items-center space-x-4 mt-4">
                <!-- Hinta -->
                <div class="text-lg font-semibold drop-shadow-lg mr-12">
                    {{ number_format($tuotes[0]->hinta, 2) }} € / Vuorokausi
                </div>
                <!-- Vuokraa-nappi -->
                <div>
                    <a href="{{ route('vuokraus.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-green-400 mx-14 shadow-md">
                        Vuokraa
                    </a>
                </div>
            </div>
        </div>

        <!-- Pagination nuolilla -->
        <div class="flex justify-between items-center mt-8">
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

            <!-- Katso, Päivitä ja Poista napit -->
            <div class="flex justify-center space-x-4">
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
