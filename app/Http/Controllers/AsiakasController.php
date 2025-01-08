<?php

namespace App\Http\Controllers;

use App\Models\Asiakas;
use Illuminate\Http\Request;

class AsiakasController extends Controller
{
    // Näytä kaikki asiakkaat
    public function index()
    {
        $asiakkaat = Asiakas::all();
        return view('asiakas.index', compact('asiakkaat'));
    }

    // Luo uusi asiakaslomake
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
            'sahkoposti' => 'required|email|max:255|unique:asiakas,sahkoposti',
            'lahiosoite' => 'nullable|string|max:100',
            'postinumero' => 'nullable|string|max:5',
            'postitoimipaikka' => 'nullable|string|max:100',
            'puhelin' => 'nullable|string|max:15',
        ]);

        Asiakas::create($validatedData);

        return redirect()->route('asiakas.index')->with('success', 'Asiakas lisätty onnistuneesti!');
    }

    // Näytä yksittäinen asiakas
    public function show(Asiakas $asiakas)
    {
        return view('asiakas.show', compact('asiakas'));
    }

    public function edit(Asiakas $asiakas)
    {

        return view('asiakas.edit', compact('asiakas'));
    }

    public function update(Request $request, Asiakas $asiakas)
    {
        dd($asiakas, $request->all());

        $validatedData = $request->validate([
            'etunimi' => 'required|string|max:100',
            'sukunimi' => 'required|string|max:100',
            'sahkoposti' => 'required|email|max:255|unique:asiakas,sahkoposti,' . $asiakas->asiakasID,
            'lahiosoite' => 'nullable|string|max:100',
            'postinumero' => 'nullable|string|max:5',
            'postitoimipaikka' => 'nullable|string|max:100',
            'puhelin' => 'nullable|string|max:15',
        ]);

        $asiakas->update($validatedData);

        return redirect()->route('asiakas.index')->with('success', 'Asiakastiedot päivitetty onnistuneesti!');
    }

    // Poista asiakas
    public function destroy(Asiakas $asiakas)
    {
        $asiakas->delete();

        return redirect()->route('asiakas.index')->with('success', 'Asiakas poistettu onnistuneesti!');
    }
}
