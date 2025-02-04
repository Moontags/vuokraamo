@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 mt-8">
    <h1 class="text-3xl font-bold mb-6 text-white mx-10">Vuokralla olevat</h1>

    @if ($vuokraukset->isEmpty())
        <p class="text-white">Ei vuokrauksia tällä hetkellä.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($vuokraukset as $vuokraus)
            <div class="rounded shadow-lg overflow-hidden">
                <div class="p-4">

                    <img src="{{ asset('storage/' . $vuokraus->kuva) }}" alt="{{ $vuokraus->tuote }}"
                        class="w-full h-64 object-cover rounded mb-4">

                    <h3 class="text-lg font-bold text-white">{{ $vuokraus->tuote }}</h3>
                    <p class="text-white">Vuokraus ID: {{ $vuokraus->id }}</p>
                    <p class="text-white">Asiakas: {{ $vuokraus->asiakas }}</p>
                    <p class="text-white">Vuokrauspvm: {{ $vuokraus->vuokrauspvm }}</p>
                    <p class="text-white">Palautuspvm: {{ $vuokraus->palautuspvm }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-16 text-white mx-4">
            {{ $vuokraukset->links() }}
        </div>
    @endif
</div>
@endsection
