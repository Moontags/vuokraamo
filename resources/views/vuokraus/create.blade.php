@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Luo uusi vuokraus</h1>

    <form action="{{ route('vuokraus.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Asiakas:</label>
            <select name="asiakasID" required class="border rounded px-4 py-2 w-full">
                @foreach ($asiakkaat as $asiakas)
                    <option value="{{ $asiakas->id }}">{{ $asiakas->nimi }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Vuokrauspäivä:</label>
            <input type="date" name="vuokrauspvm" required class="border rounded px-4 py-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Palautuspäivä:</label>
            <input type="date" name="palautuspvm" class="border rounded px-4 py-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Tuotteet:</label>
            @foreach ($tuotteet as $tuote)
                <div>
                    <input type="checkbox" name="tuotteet[]" value="{{ $tuote->tuoteID }}">
                    <label>{{ $tuote->nimi }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tallenna</button>
    </form>
</div>
@endsection
