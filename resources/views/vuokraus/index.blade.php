@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 mt-6">
    <!-- Otsikko ja nappi samalle tasolle -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold  text-white">Vuokraus</h1>
        <a href="{{ route('vuokraus.vuokralla') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Vuokralla</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 m-8">
        @foreach ($tuotteet as $tuote)
        <div class="bg-white rounded shadow-sm p-4 text-center">
            <img src="{{ asset('storage/' . $tuote->kuva) }}" alt="{{ $tuote->nimi }}" class="w-full h-56 object-cover rounded">
            <h3 class="text-lg font-bold mt-4">{{ $tuote->nimi }}</h3>
            <p class="text-gray-600">{{ $tuote->kuvaus }}</p>

            <!-- Näytä, Päivitä ja Poista napit -->
            <div class="flex justify-center space-x-8">
                <a href="{{ route('vuokraus.create') }}" class="bg-blue-400 text-white px-4 py-2 rounded mt-4 inline-block">Vuokraa tuote</a>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Sivutuksen linkit -->
    <div class="mt-24">
        {{ $tuotteet->links() }}
    </div>
</div>
@endsection
