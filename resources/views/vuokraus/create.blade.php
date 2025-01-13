@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-4xl">
    <h1 class="text-3xl font-bold mb-6 text-white text-center">Luo uusi vuokraus</h1>

    <form action="{{ route('vuokraus.store') }}" method="POST" class="flex flex-wrap lg:flex-nowrap gap-6 items-start">
        @csrf
        <!-- Vasemman puolen sisältö: Auto -->
        <div class="w-full lg:w-1/2 p-4 rounded shadow-md flex flex-col items-center mt-4">
            @if ($tuote)
                <!-- Kuva -->
                <img src="{{ Storage::url($tuote->kuva) }}" alt="{{ $tuote->nimi }}" class="w-full h-64 object-contain rounded mb-4">
                <input type="hidden" name="tuotteet[]" value="{{ $tuote->tuoteID }}">

                <!-- Auton tiedot -->
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-2 text-white">{{ $tuote->nimi }}</h3>
                    <p class="text-gray-100">{{ $tuote->kuvaus }}</p>
                    <p class="text-lg font-bold mt-2 text-white">{{ number_format($tuote->hinta, 2) }} € / Vuorokausi</p>
                </div>
            @else
                <p class="text-red-500 text-center">Valittua autoa ei löytynyt. Valitse auto ensin.</p>
            @endif
        </div>

        <!-- Oikean puolen sisältö: Lomake -->
        <div class="w-full lg:w-1/2 p-6 rounded shadow-md">
            <div class="mb-4">
                <label class="block font-bold mb-2 text-white">Asiakas:</label>
                <select name="asiakasID" class="w-full border border-gray-300 px-4 py-2 rounded text-black">
                    @foreach ($asiakkaat as $asiakas)
                        <option value="{{ $asiakas->id }}">{{ $asiakas->nimi }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Vuokrauspäivämäärä -->
            <div class="mb-4">
                <label class="block font-bold mb-2 text-white">Vuokrauspäivämäärä:</label>
                <input type="date" name="vuokrauspvm" required class="border rounded px-4 py-2 w-full text-black">
            </div>

            <!-- Palautuspäivämäärä -->
            <div class="mb-4">
                <label class="block font-bold mb-2 text-white">Palautuspäivämäärä:</label>
                <input type="date" name="palautuspvm" class="border rounded px-4 py-2 w-full text-black">
            </div>

            <!-- Tallenna-painike -->
            <div class="mt-4 text-center">
                <!-- Muokattu napin hover-tila -->
                <button type="submit" class="bg-gray-500 text-white px-3 py-3 rounded hover:bg-gray-400 w-full mt-7">Vahvista vuokraus</button>
            </div>
        </div>
    </form>
</div>
@endsection
