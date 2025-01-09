@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Vuokraukset</h1>

    @if ($vuokraukset->isEmpty())
        <p>Ei vuokrauksia tällä hetkellä.</p>
    @else
        <table class="min-w-full bg-white border border-gray-300 text-center">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Asiakas</th>
                    <th class="border px-4 py-2">Vuokrauspvm</th>
                    <th class="border px-4 py-2">Palautuspvm</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vuokraukset as $vuokraus)
                <tr>
                    <td class="border px-4 py-2">{{ $vuokraus->id }}</td>
                    <td class="border px-4 py-2">{{ $vuokraus->asiakas }}</td>
                    <td class="border px-4 py-2">{{ $vuokraus->vuokrauspvm }}</td>
                    <td class="border px-4 py-2">{{ $vuokraus->palautuspvm }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
