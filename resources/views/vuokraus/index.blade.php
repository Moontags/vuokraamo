@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold text-white mx-4">Valitse auto</h1>

        <a href="{{ route('vuokraus.vuokralla') }}" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded mx-6">Vuokralla</a>
    </div>
    <h2 class="text-2xl text-center font-bold text-white">Vapaat autot</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 m-8">
        @foreach ($tuotteet as $tuote)
        <div class="rounded shadow-sm p-4 text-center">

            <div class="mt-4">
                <img src="{{ asset('storage/' . $tuote->kuva) }}" alt="{{ $tuote->nimi }}"
                    class="w-full h-64 object-cover rounded">
            </div>
            <h3 class="text-white text-lg font-bold mt-6 mb-1">{{ $tuote->nimi }}</h3>
            <p class="text-white">{{ $tuote->kuvaus }}</p>

            <div class="flex justify-center space-x-8">
                <a href="{{ route('vuokraus.create', ['tuoteID' => $tuote->id]) }}" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded mt-4 inline-block">Vuokraa</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8 mx-4">
        {{ $tuotteet->links() }}
    </div>
</div>
@endsection
