@extends('layouts.app')

@section('title', 'Kirjaudu sisään')

@section('content')
<main class="flex-grow flex justify-center items-bottom mt-24 mx-2">
    <div class="p-8 rounded shadow-sm w-96 bg-white bg-opacity-90">
        <h2 class="text-2xl font-bold mb-4 text-center">Kirjaudu sisään</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('kirjaudu.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold">Sähköposti</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ old('email') }}" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold">Salasana</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 px-4 py-2 rounded" required>
            </div>


            <button type="submit" class="bg-gray-500 text-white px-3 py-2 w-full rounded hover:bg-gray-400">Kirjaudu</button>
        </form>
    </div>
</main>
@endsection
