@extends('layouts.app')

@section('title', 'Lisää uusi asiakas')

@section('content')
<div class="container mx-auto py-8 mb-0 max-w-4xl bg-white bg-opacity-90 rounded p-8 max-h-[100vh] overflow-auto">
    <h1 class="text-2xl font-bold mb-2">Lisää uusi asiakas</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asiakas.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="etunimi" class="block text-gray-700 font-bold">Etunimi:</label>
            <input type="text" name="etunimi" id="etunimi" value="{{ old('etunimi') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>
        <div class="mb-4">
            <label for="sukunimi" class="block text-gray-700 font-bold">Sukunimi:</label>
            <input type="text" name="sukunimi" id="sukunimi" value="{{ old('sukunimi') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>
        <div class="mb-4">
            <label for="sahkoposti" class="block text-gray-700 font-bold">Sähköposti:</label>
            <input type="email" name="sahkoposti" id="sahkoposti" value="{{ old('sahkoposti') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>
        <div class="mb-4">
            <label for="lahiosoite" class="block text-gray-700 font-bold">Lähiosoite:</label>
            <input type="text" name="lahiosoite" id="lahiosoite" value="{{ old('lahiosoite') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>
        <div class="mb-4">
            <label for="postinumero" class="block text-gray-700 font-bold">Postinumero:</label>
            <input type="text" name="postinumero" id="postinumero" value="{{ old('postinumero') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>
        <div class="mb-4">
            <label for="postitoimipaikka" class="block text-gray-700 font-bold">Postitoimipaikka:</label>
            <input type="text" name="postitoimipaikka" id="postitoimipaikka" value="{{ old('postitoimipaikka') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>
        <div class="mb-4">
            <label for="puhelin" class="block text-gray-700 font-bold">Puhelin:</label>
            <input type="text" name="puhelin" id="puhelin" value="{{ old('puhelin') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>

        <button type="submit" class="bg-gray-500 hoover:bg-gray-600 text-white px-4 py-2 rounded">Tallenna</button>
        <a href="{{ route('asiakas.index') }}" class="text-gray-500 ml-4">Peruuta</a>
    </form>
</div>
@endsection
