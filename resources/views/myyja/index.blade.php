@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-4xl bg-transparent">

    @if (session('success'))
    <div id="success-message" class="bg-green-100 text-green-700 p-6 rounded mb-4">
       {{ session('success') }}
    </div>
    @endif

    <h1 class="text-3xl font-bold mb-8 text-white text-center">Työntekijät</h1>
    <a href="{{ route('myyja.create') }}" class="px-3 py-1 border border-white text-white rounded-md bg-transparent hover:bg-slate-800 transition mb-6 inline-block mx-4 mt-4">
        Lisää työntekijä
    </a>

    <div class="hidden md:block">
        <table class="min-w-full bg-black bg-opacity-20  text-center text-white border border-gray-300">
            <thead class="bg-transparent">
                <tr>
                    <th class="border border-gray-400 px-4 py-2">ID</th>
                    <th class="border border-gray-400 px-4 py-2">Nimi</th>
                    <th class="border border-gray-400 px-4 py-2">Käyttäjätunnus</th>
                    <th class="border border-gray-400 px-4 py-2">Rooli</th>
                    <th class="border border-gray-400 px-4 py-2">Toiminnot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($myyjats as $myyja)
                <tr class="hover:bg-slate-800">
                    <td class="border border-gray-400 px-4 py-2">{{ $myyja->myyjaID }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $myyja->nimi }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $myyja->kayttajatunnus }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $myyja->rooli }}</td>
                    <td class="border border-gray-400 px-4 py-2">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('myyja.show', ['myyja' => $myyja->myyjaID]) }}" class="px-3 py-1 border border-white text-white rounded-md bg-transparent hover:bg-slate-800 transition">
                                Katso
                            </a>
                            <a href="{{ route('myyja.edit', ['myyja' => $myyja->myyjaID]) }}" class="px-3 py-1 border border-white text-white rounded-md bg-transparent hover:bg-slate-800 transition">
                                Muokkaa
                            </a>
                            <form action="{{ route('myyja.destroy', ['myyja' => $myyja->myyjaID]) }}" method="POST" onsubmit="return confirm('Haluatko varmasti poistaa tämän henkilön?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 border border-white text-white rounded-md bg-transparent hover:bg-slate-800 transition">
                                    Poista
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="block md:hidden mx-4 bg-transparent">
        @foreach ($myyjats as $myyja)
        <div class="bg-black bg-opacity-20  border border-gray-500 rounded p-4 mb-4 shadow-md text-white">
            <p><span class="font-bold">ID:</span> {{ $myyja->myyjaID }}</p>
            <p><span class="font-bold">Nimi:</span> {{ $myyja->nimi }}</p>
            <p><span class="font-bold">Käyttäjätunnus:</span> {{ $myyja->kayttajatunnus }}</p>
            <p><span class="font-bold">Rooli:</span> {{ $myyja->rooli }}</p>
            <div class="flex justify-center space-x-2 mt-4">
                <a href="{{ route('myyja.show', ['myyja' => $myyja->myyjaID]) }}" class="px-3 py-1 border border-white text-white rounded-md bg-transparent hover:bg-slate-800 transition">
                    Katso
                </a>
                <a href="{{ route('myyja.edit', ['myyja' => $myyja->myyjaID]) }}" class="px-3 py-1 border border-white text-white rounded-md bg-transparent hover:bg-slate-800 transition">
                    Muokkaa
                </a>
                <form action="{{ route('myyja.destroy', ['myyja' => $myyja->myyjaID]) }}" method="POST" onsubmit="return confirm('Haluatko varmasti poistaa tämän henkilön?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1 border border-white text-white rounded-md bg-transparent hover:bg-slate-800 transition">
                        Poista
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
