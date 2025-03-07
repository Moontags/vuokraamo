<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuote;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tuotes = DB::table('tuote')->paginate(1); // Näytetään 1 tuote per sivu
        return view('tuote.index', compact('tuotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tuote.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validoi lomaketiedot
        $request->validate([
            'nimi' => 'required|string|max:255',
            'kuvaus' => 'required|string',
            'kpl' => 'required|integer|min:1|max:20',
            'hinta' => 'required|numeric|min:5|max:300',
            'kuva' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Tallenna tiedoston nimi, jos kuva on ladattu
        $kuvaPolku = $request->hasFile('kuva') ? $request->file('kuva')->store('tuotekuvat', 'public') : null;

        // Luo uusi tuote
        Tuote::create([
            'nimi' => $request->input('nimi'),
            'kuvaus' => $request->input('kuvaus'),
            'kpl' => $request->input('kpl'),
            'hinta' => $request->input('hinta'),
            'kuva' => $kuvaPolku,
        ]);

        // Palauta onnistumisviesti
        return redirect()->route('tuote.index')->with('success', 'Tuote lisätty onnistuneesti!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tuote = Tuote::findOrFail($id);
        return view('tuote.show', compact('tuote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tuote = Tuote::findOrFail($id);
        return view('tuote.edit', compact('tuote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nimi' => 'required|string|max:255',
            'kuvaus' => 'required|string',
            'kpl' => 'required|integer|min:1|max:20',
            'hinta' => 'required|numeric|min:5|max:300',
            'kategoria' => 'required|string|max:255',
            'kuva' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tuote = Tuote::findOrFail($id);

        // Käsitellään kuvan päivitys
        if ($request->hasFile('kuva')) {
            if ($tuote->kuva && Storage::exists('public/' . $tuote->kuva)) {
                Storage::delete('public/' . $tuote->kuva);
            }

            $tuote->kuva = $request->file('kuva')->store('tuotekuvat', 'public');
        }

        // Päivitä muut tiedot
        $tuote->update($request->only(['nimi', 'kuvaus', 'kpl', 'hinta', 'kategoria']));

        // Palauta onnistumisviesti
        return redirect()->route('tuote.index')->with('success', 'Tuote päivitetty onnistuneesti!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->route('tuote.index')->withErrors(['error' => 'Sinulla ei ole oikeuksia poistaa tuotteita.']);
        }

        $tuote = Tuote::findOrFail($id);

        // Poista kuva tallennuksesta
        if ($tuote->kuva && Storage::exists('public/' . $tuote->kuva)) {
            Storage::delete('public/' . $tuote->kuva);
        }

        $tuote->delete();

        return redirect()->route('tuote.index')->with('success', 'Tuote poistettu onnistuneesti!');
    }
}
