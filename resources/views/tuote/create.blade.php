@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4 md:px-8 max-w-4xl">
    <h1 class="text-3xl font-bold mb-6 text-white">Lisää uusi tuote</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tuote.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="nimi" class="block text-gray-700 font-bold">Nimi:</label>
            <input type="text" name="nimi" id="nimi" value="{{ old('nimi') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label for="kuvaus" class="block text-gray-700 font-bold">Kuvaus:</label>
            <textarea name="kuvaus" id="kuvaus" rows="5" class="w-full border border-gray-300 px-4 py-2 rounded">{{ old('kuvaus') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="kpl" class="block text-gray-700 font-bold">Kpl:</label>
            <input type="number" name="kpl" id="kpl" value="{{ old('kpl') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label for="hinta" class="block text-gray-700 font-bold">Hinta:</label>
            <input type="number" name="hinta" id="hinta" value="{{ old('hinta') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label for="kuva" class="block text-gray-700 font-bold">Kuva:</label>
            <input type="file" name="kuva" id="kuva" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tallenna</button>
        <a href="{{ route('tuote.index') }}" class="text-gray-500 ml-4">Takaisin</a>
    </form>
</div>
@endsection
