<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuote;

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
            'kuva' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Tallenna tiedoston nimi, jos kuva on ladattu
        $kuvaPolku = null;
        if ($request->hasFile('kuva')) {
            $kuvaPolku = $request->file('kuva')->store('tuotekuvat', 'public');
        }

        // Luo uusi tuote
        \App\Models\Tuote::create([
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
