@extends('layouts.app')

@section('title', 'Vuokraamo - Asiakkaat')

@section('content')
<div class="container mx-auto py-8 flex-grow mt-8 text-black rounded shadow-md p-4 md:p-10">

    @if (session('success'))
    <div id="success-message" class="bg-green-100 text-green-700 p-4 rounded mb-4">
       {{ session('success') }}
    </div>
@endif


    <h1 class="text-3xl font-bold mb-6 text-center text-white">Asiakastiedot</h1>

    <a href="{{ route('asiakas.create') }}" class="bg-gray-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-gray-400">Lisää asiakas</a>

    <div class="hidden md:block overflow-x-auto max-w-5xl mx-auto rounded-md">
        <table class="min-w-full bg-gray-100 text-center text-black border border-gray-300">
            <thead class="bg-gray-300">
                <tr>
                    <th class="border border-gray-400 px-4 py-2">ID</th>
                    <th class="border border-gray-400 px-4 py-2">Etunimi</th>
                    <th class="border border-gray-400 px-4 py-2">Sukunimi</th>
                    <th class="border border-gray-400 px-4 py-2">Sähköposti</th>
                    <th class="border border-gray-400 px-4 py-2">Toiminnot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asiakkaat as $asiakas)
                    <tr class="hover:bg-gray-200">
                        <td class="border border-gray-400 px-4 py-2">{{ $asiakas->id }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $asiakas->etunimi }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $asiakas->sukunimi }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $asiakas->sahkoposti }}</td>
                        <td class="border border-gray-400 px-4 py-2">
                            <div class="flex flex-col md:flex-row justify-center space-y-2 md:space-y-0 md:space-x-2">
                                <a href="{{ route('asiakas.show', $asiakas->id) }}" class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-400">Näytä</a>
                                <a href="{{ route('asiakas.edit', $asiakas->id) }}" class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-400">Muokkaa</a>
                                <form action="{{ route('asiakas.destroy', $asiakas->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-400" onclick="return confirm('Haluatko varmasti poistaa tämän asiakkaan?')">Poista</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="block md:hidden mx-4">
        @foreach ($asiakkaat as $asiakas)
        <div class="bg-gray-100 border border-gray-300 rounded p-4 mb-4 shadow-md">
            <p><span class="font-bold">ID:</span> {{ $asiakas->id }}</p>
            <p><span class="font-bold">Etunimi:</span> {{ $asiakas->etunimi }}</p>
            <p><span class="font-bold">Sukunimi:</span> {{ $asiakas->sukunimi }}</p>
            <p><span class="font-bold">Sähköposti:</span> {{ $asiakas->sahkoposti }}</p>
            <div class="flex justify-center space-x-2 mt-4">
                <a href="{{ route('asiakas.show', $asiakas->id) }}" class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-400">Näytä</a>
                <a href="{{ route('asiakas.edit', $asiakas->id) }}" class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-400">Muokkaa</a>
                <form action="{{ route('asiakas.destroy', $asiakas->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Haluatko varmasti poistaa tämän asiakkaan?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-400">Poista</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
