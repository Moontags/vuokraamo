@extends('layouts.app')

@section('content')
@vite('resources/css/app.css')

<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-12">Vuokrattavat tuotteet</h1>
    <div class="flex justify-between">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 m-8">
        @foreach ($tuotteet as $tuote)
        <div class="bg-white rounded shadow-sm p-4 text-center">
            <img src="{{ asset('storage/' . $tuote->kuva) }}" alt="{{ $tuote->nimi }}" class="w-full h-48 object-cover rounded">
            <h3 class="text-lg font-bold mt-4">{{ $tuote->nimi }}</h3>
            <p class="text-gray-600">{{ $tuote->kuvaus }}</p>

            <!-- Näytä, Päivitä ja Poista napit -->
            <div class="mt-4 flex justify-center space-x-8">
                <a href="{{ route('vuokraus.create') }}" class="bg-blue-400 text-white px-4 py-2 rounded mt-4 inline-block">Vuokraa tuote</a>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Sivutuksen linkit -->
    <div class="mt-24">
        {{ $tuotteet->links('pagination::default') }}
    </div>

</div>
@endsection
