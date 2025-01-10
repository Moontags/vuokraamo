@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Vuokrattavat tuotteet</h1>

    <h2 class="text-2xl font-bold mb-4">Vuokrattavat tuotteet</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($tuotteet as $tuote)
        <div class="bg-white rounded shadow-md p-4 text-center">
            <img src="{{ asset('storage/' . $tuote->kuva) }}" alt="{{ $tuote->nimi }}" class="w-full h-48 object-cover rounded">
            <h3 class="text-lg font-bold mt-4">{{ $tuote->nimi }}</h3>
            <p class="text-gray-600">{{ $tuote->kuvaus }}</p>
            <a href="{{ route('vuokraus.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 inline-block">Vuokraa</a>
        </div>
        @endforeach
    </div>

    <div class="mt-8 justify-between flex">
        <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-4">Palaa</a>
        <a href="{{ route('tuote.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Lisää tuote</a>
        <a href="{{ route('vuokraus.vuokralla') }}" class="bg-green-500 text-white px-4 py-2 rounded">Vuokralla olevat</a>

    </div>
    </div>
</div>
@endsection

