@extends('layouts.app')

@section('title', 'Asiakkaan tiedot')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-center mt-12 text-white">Asiakkaan tiedot</h1>
<div class="flex-grow flex justify-center mt-8 mx-4">
    <div class="container bg-white p-6 rounded shadow-sm max-w-2xl">
        <div>
            <p><strong>ID:</strong> {{ $asiakas->id }}</p>
            <p><strong>Etunimi:</strong> {{ $asiakas->etunimi }}</p>
            <p><strong>Sukunimi:</strong> {{ $asiakas->sukunimi }}</p>
            <p><strong>Sähköposti:</strong> {{ $asiakas->sahkoposti }}</p>
            <p><strong>Lähiosoite:</strong> {{ $asiakas->lahiosoite }}</p>
            <p><strong>Postinumero:</strong> {{ $asiakas->postinumero }}</p>
            <p><strong>Postitoimipaikka:</strong> {{ $asiakas->postitoimipaikka }}</p>
            <p><strong>Puhelin:</strong> {{ $asiakas->puhelin }}</p>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('asiakas.index') }}" class="bg-gray-500 hoover:bg-gray-400 text-white px-4 py-2 rounded ">Takaisin</a>
        </div>
    </div>
</div>
@endsection
