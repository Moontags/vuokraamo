@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-4xl relative">

    <div class="absolute top-2 left-1/2 transform -translate-x-1/2">
        <a href="{{ route('vuokraus.vuokralla') }}" class="bg-gray-500 text-white px-4 py-3 rounded hover:bg-gray-400 shadow-md">
            Vuokralla
        </a>
    </div>

    <h1 class="text-3xl font-bold m-8 text-white text-center">Valitse vuokraus ajankohta</h1>

    @if (session('success'))
        <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('asiakas.create') }}" method="GET" class="flex flex-wrap lg:flex-nowrap gap-6 items-start">
        @csrf

        <div class="w-full lg:w-1/2 p-4 rounded shadow-md flex flex-col items-center mt-4">
            @if ($tuote)

                <img src="{{ Storage::url($tuote->kuva) }}" alt="{{ $tuote->nimi }}" class="w-full h-64 object-contain rounded mb-4">
                <input type="hidden" name="tuotteet[]" value="{{ $tuote->tuoteID }}">

                <div class="text-center">
                    <h3 class="text-xl font-bold mb-2 text-white">{{ $tuote->nimi }}</h3>
                    <p class="text-gray-100">{{ $tuote->kuvaus }}</p>
                    <p class="text-lg font-bold mt-2 text-white">{{ number_format($tuote->hinta, 2) }} € / Vuorokausi</p>
                </div>
            @else
                <p class="text-red-500 text-center">Valittua autoa ei löytynyt. Valitse auto ensin.</p>
            @endif
        </div>

        <div class="w-full lg:w-1/2 p-6 rounded shadow-md">
            {{-- <div class="mb-4">
                <label class="block font-bold mb-2 text-white">Asiakas:</label>
                <select name="asiakasID" class="w-full border border-gray-300 px-4 py-2 rounded text-black">
                    @foreach ($asiakkaat as $asiakas)
                        <option value="{{ $asiakas->id }}">{{ $asiakas->nimi }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="mb-4 flex gap-2">
                 <div>
                    <label class="block font-bold mb-2 text-white">Noutoajankohta:</label>
                    <input type="date" name="reservation_start_date" required class="border rounded px-4 py-2 w-full text-black">
                 </div>
                 <div>
                    <label class="block font-bold mb-2 text-white">Klo:</label>
                    <input type="time" name="reservation_start_time" required class="border rounded px-4 py-2 w-full text-black">
                 </div>
            </div>
            <div class="mb-4 flex gap-2">
                 <div>
                    <label class="block font-bold mb-2 text-white">Palautusajankohta:</label>
                    <input type="date" name="reservation_end_date" required class="border rounded px-4 py-2 w-full text-black">
                 </div>
                 <div>
                    <label class="block font-bold mb-2 text-white">Klo:</label>
                    <input type="time" name="reservation_end_time" required class="border rounded px-4 py-2 w-full text-black">
                 </div>
            </div>

            <div class="mt-4 text-center">

                <button type="submit" class="bg-gray-500 text-white px-3 py-3 rounded hover:bg-gray-400 w-md mt-7">Vahvista vuokraus</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000);
        }
    });
</script>
@endsection
