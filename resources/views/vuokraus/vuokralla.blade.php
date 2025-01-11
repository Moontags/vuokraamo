@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 mt-24"> <!-- Lisätty "mt-16" siirtämään koko osiota alemmas -->
    <h1 class="text-3xl font-bold mb-6 text-white">Vuokralla olevat autot</h1>

    @if ($vuokraukset->isEmpty())
        <p class="text-gray-600">Ei vuokrauksia tällä hetkellä.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($vuokraukset as $vuokraus)
            <div class="bg-white rounded shadow-lg overflow-hidden">
                <div class="p-4">
                    <img src="{{ asset('storage/' . $vuokraus->kuva) }}" alt="{{ $vuokraus->tuote }}" class="w-full h-40 object-cover rounded mb-4">
                    <h3 class="text-lg font-bold">{{ $vuokraus->tuote }}</h3>
                    <p class="text-gray-600">Vuokraus ID: {{ $vuokraus->id }}</p>
                    <p class="text-gray-600">Asiakas: {{ $vuokraus->asiakas }}</p>
                    <p class="text-gray-600">Vuokrauspvm: {{ $vuokraus->vuokrauspvm }}</p>
                    <p class="text-gray-600">Palautuspvm: {{ $vuokraus->palautuspvm }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Sivutuksen linkit -->
        <div class="mt-16">
            {{ $vuokraukset->links() }}
        </div>
    @endif
</div>
@endsection
