@extends('layouts.app')

@section('title', 'Muokkaa myyjää')

@section('content')
<div class="container mx-auto py-8 flex-grow max-w-4xl px-4" >
    <h1 class="text-3xl font-bold mb-6 text-white">Muokkaa Työntekijää</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('myyja.update', $myyja->myyjaID) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nimi" class="block text-gray-700 font-bold">Nimi:</label>
            <input type="text" name="nimi" id="nimi" value="{{ old('nimi', $myyja->nimi) }}" class="w-full border border-gray-300 px-4 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="kayttajatunnus" class="block text-gray-700 font-bold">Käyttäjätunnus:</label>
            <input type="text" name="kayttajatunnus" id="kayttajatunnus" value="{{ old('kayttajatunnus', $myyja->kayttajatunnus) }}" class="w-full border border-gray-300 px-4 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="rooli" class="block text-gray-700 font-bold">Rooli:</label>
            <input type="text" name="rooli" id="rooli" value="{{ old('rooli', $myyja->rooli) }}" class="w-full border border-gray-300 px-4 py-2 rounded" required>
        </div>

        <button type="submit" class="bg-gray-500 text-white px-3 py-2 rounded hover:bg-gray-400">Tallenna muutokset</button>
        <a href="{{ route('myyja.index') }}" class="text-gray-500 ml-4">Peruuta</a>
    </form>
</div>
@endsection
