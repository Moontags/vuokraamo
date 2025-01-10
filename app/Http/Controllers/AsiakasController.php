<?php

namespace App\Http\Controllers;

use App\Models\Asiakas;
use Illuminate\Http\Request;

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
        $asiakas = Asiakas::find($id); // Etsi asiakas ID:n perusteella
        if (!$asiakas) {
            abort   (404, 'Asiakasta ei löytynyt');     }

        return view('asiakas.show', compact('asiakas'));

    }

    public function edit($id)
    {
        $asiakas = Asiakas::find($id); // Etsi asiakas ID:n perusteella
        if (!$asiakas) {
            abort(404, 'Asiakasta ei löytynyt');
        }
        return view('asiakas.edit', compact('asiakas'));
    }


    public function update(Request $request, Asiakas $asiakas)
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

        $asiakas->update($validatedData);

        return redirect()->route('asiakas.index')->with('success', 'Asiakastiedot päivitetty onnistuneesti!');
    }
    public function destroy($id)
    {
        $asiakas = Asiakas::find($id);

        if ($asiakas) {
            $asiakas->delete();
            return redirect()->route('asiakas.index')->with('success', 'Asiakas poistettu onnistuneesti!');
        } else {
            return redirect()->route('asiakas.index')->with('error', 'Asiakasta ei löytynyt.');
        }
    }
}
