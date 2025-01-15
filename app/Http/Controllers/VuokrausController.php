<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VuokrausController extends Controller
{
    public function index()
    {
        // Haetaan vuokraukset (oletetaan, että nämä eivät tarvitse sivutusta)
        $vuokraukset = DB::table('vuokraus')
            ->join('asiakas', 'vuokraus.asiakasID', '=', 'asiakas.id')
            ->select('vuokraus.*', DB::raw("CONCAT(asiakas.etunimi, ' ', asiakas.sukunimi) as asiakas"))
            ->get();

        // Sivutetaan tuotteet
        $tuotteet = DB::table('tuote')
            ->select('tuoteID as id', 'nimi', 'kuvaus', 'kuva') // Oletetaan sarakkeet
            ->paginate(3); // 3 tuotetta per sivu

        // Palautetaan näkymä
        return view('vuokraus.index', compact('vuokraukset', 'tuotteet'));
    }

// Removed duplicate method


public function create(Request $request, $tuoteID = null)
{
    $asiakkaat = DB::table('asiakas')
        ->select('id', DB::raw("CONCAT(etunimi, ' ', sukunimi) AS nimi"))
        ->get();

    // Tarkistetaan, onko `tuoteID` lähetetty
    $tuote = null;
    if ($tuoteID) {
        $tuote = DB::table('tuote')->where('tuoteID', $tuoteID)->first();
    }


    return view('vuokraus.create', compact('asiakkaat', 'tuote'));
}


public function store(Request $request)
{
    $request->validate([
        'asiakasID' => 'required|exists:asiakas,id',
        'vuokrauspvm' => 'required|date',
        'palautuspvm' => 'nullable|date|after_or_equal:vuokrauspvm',
        'tuotteet' => 'required|array',
        'tuotteet.*' => 'exists:tuote,tuoteID',
    ]);

    DB::transaction(function () use ($request) {
        $vuokrausID = DB::table('vuokraus')->insertGetId([
            'asiakasID' => $request->asiakasID,
            'vuokrauspvm' => $request->vuokrauspvm,
            'palautuspvm' => $request->palautuspvm,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($request->tuotteet as $tuoteID) {
            DB::table('vuokrausrivi')->insert([
                'vuokrausID' => $vuokrausID,
                'tuoteID' => $tuoteID,
                'alkamisaika' => $request->vuokrauspvm,
                'paattymisaika' => $request->palautuspvm,
                'palautettu' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    });

    // Lähetetään onnistumisviesti
    return redirect()
    ->route('vuokraus.create', ['tuoteID' => $request->tuotteet[0]]) // Välitä ensimmäinen tuoteID
    ->with('success', 'Vuokraus tallennettu onnistuneesti!');
}

    public function vuokralla()
    {
        $vuokraukset = DB::table('vuokraus')
            ->join('asiakas', 'vuokraus.asiakasID', '=', 'asiakas.id')
            ->join('vuokrausrivi', 'vuokraus.id', '=', 'vuokrausrivi.vuokrausID')
            ->join('tuote', 'vuokrausrivi.tuoteID', '=', 'tuote.tuoteID')
            ->select(
                'vuokraus.id',
                DB::raw("CONCAT(asiakas.etunimi, ' ', asiakas.sukunimi) as asiakas"),
                'vuokraus.vuokrauspvm',
                'vuokraus.palautuspvm',
                'tuote.nimi as tuote',
                'tuote.kuva'
            )
            ->paginate(3); // Sivutetaan 3 tulosta per sivu

        return view('vuokraus.vuokralla', compact('vuokraukset'));
    }
}
