@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-5xl relative">
    @if (session('success'))
        <div id="success-message" class="bg-green-100 text-green-500 p-4 rounded mb-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6 px-4">
        <h1 class="text-3xl font-bold text-white text-center flex-grow">Vuokra automme</h1>
        @if(Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('tuote.create') }}" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded ml-4">
                Lisää
            </a>
        @endif
    </div>

    @if ($tuotes->count() > 0)
        @foreach ($tuotes as $tuote)

        <div class="shadow-lg rounded p-6 text-center">
            <img src="{{ Storage::url($tuote->kuva) }}" alt="{{ $tuote->nimi }}" class="w-full h-80 object-contain rounded mb-6 mx-auto sm:h-64 md:h-72 lg:h-80">

            <h3 class="text-2xl font-bold mb-4 text-white drop-shadow-lg">{{ $tuote->nimi }}</h3>
            <p class="mb-4 text-white drop-shadow-sm">{{ $tuote->kuvaus }}</p>

            <div class="flex flex-col justify-center items-center text-center space-y-4 mt-4">
                <div class="text-lg font-semibold text-white drop-shadow-lg">
                    {{ number_format($tuote->hinta, 2) }} € / Vuorokausi
                </div>
                <a href="{{ route('vuokraus.create', ['tuoteID' => $tuote->tuoteID]) }}"
                   class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-400 shadow-md">
                    Vuokraa
                </a>
            </div>

            <div class="flex justify-center space-x-6 mt-8">
                <a href="{{ route('tuote.show', ['tuote' => $tuote->tuoteID]) }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-400">
                   Katso
                </a>

                @if(Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{ route('tuote.edit', ['tuote' => $tuote->tuoteID]) }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-400">
                       Päivitä
                    </a>
                    <form action="{{ route('tuote.destroy', ['tuote' => $tuote->tuoteID]) }}"
                          method="POST"
                          onsubmit="return confirm('Haluatko varmasti poistaa tämän tuotteen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-400">
                            Poista
                        </button>
                    </form>
                @endif
            </div>

        </div>
        @endforeach

        <div class="flex justify-between items-center mt-8 px-4">
            @if ($tuotes->onFirstPage())
                <button class="bg-gray-500 text-white px-4 py-2 rounded cursor-not-allowed">
                    <i class="bi bi-arrow-left"></i> Edellinen
                </button>
            @else
                <a href="{{ $tuotes->previousPageUrl() }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-400">
                    <i class="bi bi-arrow-left"></i> Edellinen
                </a>
            @endif

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
            }, 2000);
        }
    });
</script>

@endsection
