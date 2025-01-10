<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VuokrausController extends Controller
{
    public function index()
    {
        $vuokraukset = DB::table('vuokraus')
        ->join('asiakas', 'vuokraus.asiakasID', '=', 'asiakas.id')
        ->select('vuokraus.*', DB::raw("CONCAT(asiakas.etunimi, ' ', asiakas.sukunimi) as asiakas"))
        ->get();

    $tuotteet = DB::table('tuote')
        ->select('tuoteID as id', 'nimi', 'kuvaus', 'kuva') // Oletetaan, että sarakkeet ovat nämä
        ->get();

    return view('vuokraus.index', compact('vuokraukset', 'tuotteet'));
    }

    public function create()
    {
        $asiakkaat = DB::table('asiakas')
            ->select('id', DB::raw("CONCAT(etunimi, ' ', sukunimi) AS nimi"))
            ->get();

        $tuotteet = DB::table('tuote')->select('tuoteID as id', 'nimi')->get();

        return view('vuokraus.create', compact('asiakkaat', 'tuotteet'));
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

        return redirect()->route('vuokraus.index')->with('success', 'Vuokraus tallennettu onnistuneesti!');
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
        ->get();

    return view('vuokraus.vuokralla', compact('vuokraukset'));
}

}
