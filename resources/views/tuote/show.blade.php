@extends('layouts.app')

@section('title', 'Tuotteen tiedot')

@section('content')
<main class="flex-grow flex justify-center items-center">
    <div class="bg-white p-8 rounded shadow-sm max-w-md w-full mx-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Tuotteen tiedot</h2>
        <div class="mb-4">
            <p class="mb-2"><strong>Nimi:</strong> {{ $tuote->nimi }}</p>
            <p class="mb-2"><strong>Kuvaus:</strong> {{ $tuote->kuvaus }}</p>
            <p class="mb-2"><strong>Hinta:</strong> {{ number_format($tuote->hinta, 2) }} €</p>
            <p class="mb-2"><strong>Kappalemäärä:</strong> {{ $tuote->kpl }}</p>
            <div class="mb-4">

                @if ($tuote->kuva)
                <img src="{{ url('storage/' . $tuote->kuva) }}" alt="Tuotekuva" class="w-full rounded shadow-md">
                @else
                    <p class="text-gray-500">Ei kuvaa saatavilla.</p>
                @endif
            </div>
        </div>
        <a href="{{ route('tuote.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded block text-center">Takaisin</a>
    </div>
</main>
@endsection
