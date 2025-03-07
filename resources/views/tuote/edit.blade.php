@extends('layouts.app')

@section('title', 'Muokkaa tuotetta')

@section('content')
<main class="flex-grow flex justify-center items-center">
    @if (session('success'))
        <div class="bg-green-100 text-green-500 p-4 rounded mb-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded shadow-sm w-full max-w-3xl mx-4">
        <h2 class="text-2xl font-bold mb-6 text-center">Muokkaa tuotetta</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tuote.update', $tuote->tuoteID) }}" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row">
            @csrf
            @method('PUT')


            <div class="md:w-1/2 md:pr-6">

                <div class="mb-4">
                    <label for="nimi" class="block text-gray-700 font-bold">Nimi</label>
                    <input type="text" name="nimi" id="nimi" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->nimi }}" required>
                </div>

                <div class="mb-0">
                    <label for="kuvaus" class="block text-gray-700 font-bold">Kuvaus</label>
                    <textarea name="kuvaus" id="kuvaus" class="w-full border border-gray-300 px-4 py-2 rounded" required>{{ $tuote->kuvaus }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="kpl" class="block text-gray-700 font-bold">Kappalemäärä</label>
                    <input type="number" name="kpl" id="kpl" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->kpl }}" required>
                </div>

                <div class="mb-4">
                    <label for="hinta" class="block text-gray-700 font-bold">Vuokraushinta</label>
                    <input type="number" step="0.01" name="hinta" id="hinta" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->hinta }}" required>
                </div>

                <div class="mb-5">
                    <label for="kategoria" class="block text-gray-700 font-bold">Kategoria</label>
                    <input type="text" name="kategoria" id="kategoria" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ $tuote->kategoria }}" required>
                </div>

                <div class="mt-4">
                    <a href="{{ route('tuote.index') }}" class="bg-gray-500 text-white px-4 py-2.5 rounded hover:bg-gray-400">
                        Takaisin
                    </a>
                </div>
            </div>


            <div class="md:w-1/2 md:pl-6 flex flex-col items-center">
                <div>
                    @if ($tuote->kuva)
                        <img src="{{ asset('storage/' . $tuote->kuva) }}" alt="Tuotekuva" class="w-full rounded shadow-sm mt-6">
                    @else
                        <p class="text-gray-600">Ei kuvaa saatavilla.</p>
                    @endif
                    <label for="kuva" class="block text-gray-700 font-bold mt-5">Uusi kuva:</label>
                    <input type="file" name="kuva" id="kuva" class="w-full border border-gray-300 px-4 py-2 rounded mt-10">
                </div>
                <div class="mt-4 self-stretch flex justify-end">
                    <button type="submit" class="bg-gray-500 text-white px-4 py-1.5 rounded hover:bg-gray-400 mt-16">
                        Tallenna
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>

@endsection
