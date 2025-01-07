<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuote;
use Illuminate\Support\Facades\Storage; // Add this line

class TuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tuotes = Tuote::all(); // Määritellään muuttuja $tuotes
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
            'painoraja' => 'required|integer|min:5|max:300',
            'kuva' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Tallenna tiedoston nimi, jos kuva on ladattu
        $kuvaPolku = null;
        if ($request->hasFile('kuva')) {
            $kuvaPolku = $request->file('kuva')->store('tuotekuvat', 'public');
        }

        // Luo uusi tuote
        Tuote::create([
            'nimi' => $request->input('nimi'),
            'kuvaus' => $request->input('kuvaus'),
            'kpl' => $request->input('kpl'),
            'painoraja' => $request->input('painoraja'),
            'kuva' => $kuvaPolku,
        ]);

        // Ohjaa takaisin tuotteiden listaukseen
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
        $tuote = Tuote::where('tuoteID', $id)->firstOrFail();
        return view('tuote.edit', compact('tuote'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validoi lomaketiedot
        $request->validate([
            'nimi' => 'required|string|max:255',
            'kuvaus' => 'required|string',
            'kpl' => 'required|integer|min:1|max:20',
            'painoraja' => 'required|integer|min:5|max:300',
            'kuva' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tuote = Tuote::findOrFail($id);

        // Päivitä kuva, jos uusi kuva on ladattu
        if ($request->hasFile('kuva')) {
            $kuvaPolku = $request->file('kuva')->store('tuotekuvat', 'public');
            $tuote->kuva = $kuvaPolku;
        }

        // Päivitä tuotteen tiedot
        $tuote->update([
            'nimi' => $request->input('nimi'),
            'kuvaus' => $request->input('kuvaus'),
            'kpl' => $request->input('kpl'),
            'painoraja' => $request->input('painoraja'),
        ]);

        // Ohjaa takaisin tuotteiden listaukseen
        return redirect()->route('tuote.index')->with('success', 'Tuotteen tiedot päivitetty onnistuneesti!');
    }

    /**
     * Remove the specified resource from storage.
     */

        public function destroy(string $id)
        {
            $tuote = Tuote::findOrFail($id);

            // Poistetaan kuva, jos se on olemassa
            if ($tuote->kuva && Storage::exists('public/' . $tuote->kuva)) {
                Storage::delete('public/' . $tuote->kuva);
            }

            // Poistetaan tuote tietokannasta
            $tuote->delete();

            // Ohjaa takaisin tuotteiden listaukseen
            return redirect()->route('tuote.index')->with('success', 'Tuote poistettu onnistuneesti!');
        }
    }
