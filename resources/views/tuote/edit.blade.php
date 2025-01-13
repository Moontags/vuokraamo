@extends('layouts.app')

@section('title', 'Muokkaa tuotetta')

@section('content')
<main class="flex-grow flex justify-center items-center">
    <div class="bg-white p-8 rounded shadow-sm w-full max-w-3xl">
        <h2 class="text-2xl font-bold mb-6 text-center">Muokkaa tuotetta</h2>
        <div class="flex flex-col md:flex-row">
            <!-- Lomakekentät vasemmalla -->
            <div class="md:w-1/2 md:pr-6">
                <form action="{{ route('tuote.update', $tuote->tuoteID) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Nimi -->
                    <div class="mb-4">
                        <label for="nimi" class="block text-gray-700 font-bold">Nimi</label>
                        <input type="text" name="nimi" id="nimi" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->nimi }}" required>
                    </div>
                    <!-- Kuvaus -->
                    <div class="mb-4">
                        <label for="kuvaus" class="block text-gray-700 font-bold">Kuvaus</label>
                        <textarea name="kuvaus" id="kuvaus" class="w-full border border-gray-300 px-4 py-2 rounded" required>{{ $tuote->kuvaus }}</textarea>
                    </div>
                    <!-- Kappalemäärä -->
                    <div class="mb-4">
                        <label for="kpl" class="block text-gray-700 font-bold">Kappalemäärä</label>
                        <input type="number" name="kpl" id="kpl" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->kpl }}" required>
                    </div>
                    <!-- Vuokraushinta -->
                    <div class="mb-4">
                        <label for="hinta" class="block text-gray-700 font-bold">Vuokraushinta</label>
                        <input type="number" step="0.01" name="hinta" id="hinta" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->hinta }}" required>
                    </div>
                    <!-- Kategoria -->
                    <div class="mb-4">
                        <label for="kategoria" class="block text-gray-700 font-bold">Kategoria</label>
                        <input type="text" name="kategoria" id="kategoria" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->kategoria }}" required>
                    </div>
                    <!-- Kuva -->
                    <div class="mb-4">
                        <label for="kuva" class="block text-gray-700 font-bold">Uusi kuva</label>
                        <input type="file" name="kuva" id="kuva" class="w-full border border-gray-300 px-4 py-2 rounded">
                    </div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded w-full mt-2">Tallenna</button>
                </form>
            </div>

            <!-- Tuotekuva oikealla -->
            <div class="md:w-1/2 md:pl-6 mt-6 md:mt-0 flex flex-col items-center">
                @if ($tuote->kuva)
                    <img src="{{ asset('storage/' . $tuote->kuva) }}" alt="Tuotekuva" class="w-full rounded shadow-sm">
                @else
                    <p class="text-gray-600">Ei kuvaa saatavilla.</p>
                @endif
                <a href="{{ route('tuote.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 block text-center">Takaisin</a>
            </div>
        </div>
    </div>
</main>
@endsection
