@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-xl text-white">
    <h1 class="text-3xl font-bold mb-6 text-white">Luo uusi vuokraus</h1>

    <form action="{{ route('vuokraus.store') }}" method="POST">
        @csrf
        <div class="mb-4 text-white">
            <label class="block font-bold mb-2 text-white">Asiakas:</label>
            <select name="asiakasID" class="w-full border border-gray-300 px-4 py-2 rounded text-black">
                @foreach ($asiakkaat as $asiakas)
                    <option value="{{ $asiakas->id }}">{{ $asiakas->nimi }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2 text-white">Vuokrauspäivämäärä:</label>
            <input type="date" name="vuokrauspvm" required class="border rounded px-4 py-2 w-full text-black">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2 text-white">Palautuspäivämäärä:</label>
            <input type="date" name="palautuspvm" class="border rounded px-4 py-2 w-full text-black">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2 text-white">Valitse auto:</label>
            @foreach ($tuotteet as $tuote)
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="tuotteet[]" value="{{ $tuote->id }}" id="tuote-{{ $tuote->id }}" class="text-blue-500">
                    <label for="tuote-{{ $tuote->id }}" class="text-white">{{ $tuote->nimi }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tallenna</button>
    </form>
</div>
@endsection
