<?php

namespace App\Http\Controllers;

use App\Models\Asiakas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsiakasController extends Controller
{
    public function index()
    {
        $asiakkaat = Asiakas::all();
        return view('asiakas.index', compact('asiakkaat'));
    }

    public function create()
    {
        return view('asiakas.create');
    }

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

    public function show($id)
    {
        $asiakas = Asiakas::findOrFail($id); // Varmistaa, että asiakas löytyy
        return view('asiakas.show', compact('asiakas'));
    }

    public function edit($id)
    {
        $asiakas = Asiakas::findOrFail($id); // Varmistaa, että asiakas löytyy
        return view('asiakas.edit', compact('asiakas'));
    }

    public function update(Request $request, $id)
    {
        // Hae asiakas tietokannasta tai heitä virhe, jos asiakasta ei löydy
        $asiakas = Asiakas::findOrFail($id);

        // Validoi lomakkeen tiedot
        $validatedData = $request->validate([
            'etunimi' => 'required|string|max:100',
            'sukunimi' => 'required|string|max:100',
            'sahkoposti' => 'required|email|max:255|unique:asiakas,sahkoposti,' . $id,
            'lahiosoite' => 'nullable|string|max:100',
            'postinumero' => 'nullable|string|max:5',
            'postitoimipaikka' => 'nullable|string|max:100',
            'puhelin' => 'nullable|string|max:15',
        ]);

        // Pakotettu päivitys ilman isDirty-tarkistusta
        $asiakas->forceFill($validatedData)->save();

        // Palautetaan käyttäjälle onnistumisviesti
        return redirect()->route('asiakas.index')->with('success', 'Asiakastiedot päivitetty onnistuneesti!');
    }

    public function destroy($id)
    {
        $asiakas = Asiakas::findOrFail($id); // Varmistaa, että asiakas löytyy

        $asiakas->delete();
        return redirect()->route('asiakas.index')->with('success', 'Asiakas poistettu onnistuneesti!');
    }
}
