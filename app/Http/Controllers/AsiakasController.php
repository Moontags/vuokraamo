<?php

namespace App\Http\Controllers;

use App\Models\Asiakas;
use Illuminate\Http\Request;

class AsiakasController extends Controller
{
    // Näytä kaikki asiakkaat
    public function index()
    {
        $asiakkaat = Asiakas::all(); // Hae kaikki asiakkaat tietokannasta
        return view('asiakas.index', compact('asiakkaat')); // Palauta näkymä
    }

    // Näytä lomake uuden asiakkaan luomiseen
    public function create()
    {
        return view('asiakas.create');
    }

    // Tallenna uusi asiakas
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'etunimi' => 'required|string|max:100',
            'sukunimi' => 'required|string|max:100',
            'sahkoposti' => 'required|email|max:255|unique:asiakas',
            'lahiosoite' => 'nullable|string|max:100',
            'postinumero' => 'nullable|string|max:5',
            'postitoimipaikka' => 'nullable|string|max:100',
            'puhelin' => 'nullable|string|max:15',
        ]);

        \App\Models\Asiakas::create($validatedData);

        return redirect()->route('asiakas.index')->with('success', 'Asiakas lisätty onnistuneesti!');
    }


    // Näytä yksittäisen asiakkaan tiedot
    public function show(Asiakas $asiakas)
    {
        return view('asiakas.show', compact('asiakas'));
    }

    // Näytä lomake asiakkaan muokkaamiseen
    public function edit(\App\Models\Asiakas $asiakas)
    {
        return view('asiakas.edit', compact('asiakas'));
    }
public function update(Request $request, \App\Models\Asiakas $asiakas)
{
    $validatedData = $request->validate([
        'etunimi' => 'required|string|max:100',
        'sukunimi' => 'required|string|max:100',
        'sahkoposti' => 'required|email|max:255|unique:asiakas,sahkoposti,' . $asiakas->id,
        'lahiosoite' => 'nullable|string|max:100',
        'postinumero' => 'nullable|string|max:5',
        'postitoimipaikka' => 'nullable|string|max:100',
        'puhelin' => 'nullable|string|max:15',
    ]);

    $asiakas->update($validatedData); // Päivitä tiedot

    return redirect()->route('asiakas.index')->with('success', 'Asiakastiedot päivitetty onnistuneesti!');
}


    // Poista asiakas
    public function destroy(Asiakas $asiakas)
    {
        $asiakas->delete(); // Poista asiakas tietokannasta

        return redirect()->route('asiakas.index')->with('success', 'Asiakas poistettu onnistuneesti!');
    }
}
