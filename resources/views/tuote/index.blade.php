@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-5xl relative">
    @if (session('success'))
        <div id="success-message" class="bg-green-100 text-green-500 p-4 rounded mb-2">
            {{ session('success') }}
        </div>
    @endif

    <!-- Otsikko ja "Lisää auto" -nappi -->
    <div class="flex justify-between items-center mb-6 px-4">
        <h1 class="text-3xl font-bold text-white text-center flex-grow">Vuokra automme</h1>
        @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('tuote.create') }}" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded ml-4">
            Lisää
        </a>
    @endif

    </div>

    @if ($tuotes->count() > 0)
        <!-- Tuotekortti -->
        <div class="shadow-lg rounded p-6 text-center">
            <img src="{{ Storage::url($tuotes[0]->kuva) }}" alt="{{ $tuotes[0]->nimi }}" class="w-full h-80 object-contain rounded mb-6 mx-auto sm:h-64 md:h-72 lg:h-80">

            <h3 class="text-2xl font-bold mb-4 text-white drop-shadow-lg">{{ $tuotes[0]->nimi }}</h3>
            <p class="mb-4 text-white drop-shadow-sm">{{ $tuotes[0]->kuvaus }}</p>

            <!-- Hinta ja Vuokraa-nappi -->
            <div class="flex flex-col justify-center items-center text-center space-y-4 mt-4">
                <div class="text-lg font-semibold text-white drop-shadow-lg">
                    {{ number_format($tuotes[0]->hinta, 2) }} € / Vuorokausi
                </div>
                <a href="{{ route('vuokraus.create', ['tuoteID' => $tuotes[0]->tuoteID]) }}"
                   class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-400 shadow-md">
                    Vuokraa
                </a>
            </div>

            <!-- Toimintonapit pienille näytöille -->
            <div class="md:hidden mt-4 flex flex-col items-center space-y-2">
                <a href="{{ route('tuote.show', ['tuote' => $tuotes[0]->tuoteID]) }}"
                   class="text-white hover:bg-gray-400 px-4 py-2 rounded w-full text-center">
                   Katso
                </a>
                <a href="{{ route('tuote.edit', ['tuote' => $tuotes[0]->tuoteID]) }}"
                   class="text-white hover:bg-gray-400 px-4 py-2 rounded w-full text-center">
                   Päivitä
                </a>
                <form action="{{ route('tuote.destroy', ['tuote' => $tuotes[0]->tuoteID]) }}"
                      method="POST"
                      onsubmit="return confirm('Haluatko varmasti poistaa tämän tuotteen?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-white hover:bg-red-100 px-4 py-2 rounded w-full text-center">
                        Poista
                    </button>
                </form>
            </div>
        </div>

        <!-- Navigointipainikkeet -->
        <div class="flex justify-between items-center mt-8 px-4">
            <!-- Edellinen -->
            @if ($tuotes->onFirstPage())
                <button class="bg-gray-500 text-white px-4 py-2 rounded cursor-not-allowed">
                    <i class="bi bi-arrow-left"></i> Edellinen
                </button>
            @else
                <a href="{{ $tuotes->previousPageUrl() }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-400">
                    <i class="bi bi-arrow-left"></i> Edellinen
                </a>
            @endif

            <!-- Navigointi keskitetysti -->
            <div class="hidden md:flex justify-center space-x-4">
                <a href="{{ route('tuote.show', ['tuote' => $tuotes[0]->tuoteID]) }}" class="bg-black-500 text-white px-4 py-2 rounded hover:bg-gray-400">Katso</a>
                <a href="{{ route('tuote.edit', ['tuote' => $tuotes[0]->tuoteID]) }}" class="bg-black-500 text-white px-4 py-2 rounded hover:bg-gray-400">Päivitä</a>
                @if(Auth::check() && Auth::user()->role === 'admin')
                        <form action="{{ route('tuote.destroy', ['tuote' => $tuote->tuoteID]) }}" method="POST"
                            onsubmit="return confirm('Haluatko varmasti poistaa tämän tuotteen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white hover:bg-red-100 px-4 py-2 rounded w-full text-center">
                                Poista
                            </button>
                        </form>
                    @endif
            </div>

            <!-- Seuraava -->
            @if ($tuotes->hasMorePages())
                <a href="{{ $tuotes->nextPageUrl() }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-400">
                    Seuraava <i class="bi bi-arrow-right"></i>
                </a>
            @else
                <button class="bg-gray-500 text-white px-4 py-2 rounded opacity-50 cursor-not-allowed">
                    Seuraava <i class="bi bi-arrow-right"></i>
                </button>
            @endif
        </div>
    @else
        <p class="text-white text-center">Ei tuotteita saatavilla.</p>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000); // Viesti piilotetaan 3 sekunnin kuluttua
        }
    });
</script>

@endsection
