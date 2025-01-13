@extends('layouts.app')

@section('title', 'Myyjän tiedot')

@section('content')
<div class="container mx-auto py-8 flex-grow max-w-4xl">
    <h1 class="text-3xl font-bold mb-6">Myyjän tiedot</h1>

    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>ID:</strong> {{ $myyja->myyjaID }}</p>
        <p><strong>Nimi:</strong> {{ $myyja->nimi }}</p>
        <p><strong>Käyttäjätunnus:</strong> {{ $myyja->kayttajatunnus }}</p>
        <p><strong>Rooli:</strong> {{ $myyja->rooli }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('myyja.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Takaisin</a>
    </div>
</div>
@endsection
