@extends('layouts.app')

@section('title', 'Myyjän tiedot')

@section('content')
<div class="container mx-auto py-8 flex-grow max-w-2xl px-4">
    <h1 class="text-3xl font-bold mb-6 text-white">Työntekijä</h1>

    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>ID:</strong> {{ $myyja->myyjaID }}</p>
        <p><strong>Nimi:</strong> {{ $myyja->nimi }}</p>
        <p><strong>Käyttäjätunnus:</strong> {{ $myyja->kayttajatunnus }}</p>
        <p><strong>Rooli:</strong> {{ $myyja->rooli }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('myyja.index') }}" class="px-3 py-2 border border-gray-200 text-white rounded-md bg-transparent hover:bg-slate-800 transition">Takaisin</a>
    </div>
</div>
@endsection
