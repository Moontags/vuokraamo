<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuote;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TuoteController extends Controller
{

    public function index()
    {
        $tuotes = DB::table('tuote')->paginate(1);
        return view('tuote.index', compact('tuotes'));
    }


    public function create()
    {
        return view('tuote.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'nimi' => 'required|string|max:255',
            'kuvaus' => 'required|string',
            'kpl' => 'required|integer|min:1|max:20',
            'hinta' => 'required|numeric|min:5|max:300',
            'kuva' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $kuvaPolku = $request->hasFile('kuva') ? $request->file('kuva')->store('tuotekuvat', 'public') : null;


        Tuote::create([
            'nimi' => $request->input('nimi'),
            'kuvaus' => $request->input('kuvaus'),
            'kpl' => $request->input('kpl'),
            'hinta' => $request->input('hinta'),
            'kuva' => $kuvaPolku,
        ]);

        return redirect()->route('tuote.index')->with('success', 'Tuote lisätty onnistuneesti!');
    }

    public function show(string $id)
    {
        $tuote = Tuote::findOrFail($id);
        return view('tuote.show', compact('tuote'));
    }


    public function edit(string $id)
    {
        $tuote = Tuote::findOrFail($id);
        return view('tuote.edit', compact('tuote'));
    }


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

        if ($request->hasFile('kuva')) {
            if ($tuote->kuva && Storage::exists('public/' . $tuote->kuva)) {
                Storage::delete('public/' . $tuote->kuva);
            }

            $tuote->kuva = $request->file('kuva')->store('tuotekuvat', 'public');
        }


        $tuote->update($request->only(['nimi', 'kuvaus', 'kpl', 'hinta', 'kategoria']));


        return redirect()->route('tuote.index')->with('success', 'Tuote päivitetty onnistuneesti!');
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->route('tuote.index')->withErrors(['error' => 'Sinulla ei ole oikeuksia poistaa tuotteita.']);
        }

        $tuote = Tuote::findOrFail($id);

        if ($tuote->kuva && Storage::exists('public/' . $tuote->kuva)) {
            Storage::delete('public/' . $tuote->kuva);
        }

        $tuote->delete();

        return redirect()->route('tuote.index')->with('success', 'Tuote poistettu onnistuneesti!');
    }
}
