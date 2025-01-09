<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VuokrausController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $vuokraukset = DB::table('vuokraus')
            ->join('asiakas', 'vuokraus.asiakasID', '=', 'asiakas.id')
            ->select(
                'vuokraus.*',
                DB::raw("CONCAT(asiakas.etunimi, ' ', asiakas.sukunimi) as asiakas")
            )
            ->get();

        return view('vuokraus.index', compact('vuokraukset'));
    }

    public function create()
    {
        $asiakkaat = DB::table('asiakas')->select('id', DB::raw("CONCAT(etunimi, ' ', sukunimi) AS nimi"))->get();
        $tuotteet = DB::table('tuote')->select('tuoteID', 'nimi')->get();

        return view('vuokraus.create', compact('asiakkaat', 'tuotteet'));
    }

    public function store(Request $request)
=======

    public function lomake()
{
    $asiakkaat = DB::table('asiakas')
        ->select('id', DB::raw("CONCAT(etunimi, ' ', sukunimi) AS nimi"))
        ->get();

    $tuotteet = DB::table('tuote')
        ->select('tuoteID AS id', 'nimi')
        ->get();

    return view('vuokraus', compact('asiakkaat', 'tuotteet'));
}


    public function tallenna(Request $request)
>>>>>>> origin/main
    {
        $request->validate([
            'asiakasID' => 'required|exists:asiakas,id',
            'vuokrauspvm' => 'required|date',
            'palautuspvm' => 'nullable|date|after_or_equal:vuokrauspvm',
<<<<<<< HEAD
            'tuotteet' => 'required|array',
            'tuotteet.*' => 'exists:tuote,tuoteID',
        ]);

        DB::transaction(function () use ($request) {
=======
            'tuote.*' => 'required|exists:tuote,tuoteID',
            'alkamisaika.*' => 'required|date',
            'paattymisaika.*' => 'required|date|after_or_equal:alkamisaika.*',
            'hinta.*' => 'required|numeric',
        ]);

        DB::transaction(function () use ($request) {
            $kokonaishinta = array_sum($request->hinta);

>>>>>>> origin/main
            $vuokrausID = DB::table('vuokraus')->insertGetId([
                'asiakasID' => $request->asiakasID,
                'vuokrauspvm' => $request->vuokrauspvm,
                'palautuspvm' => $request->palautuspvm,
<<<<<<< HEAD
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
=======
                'kokonaishinta' => $kokonaishinta,
            ]);

            foreach ($request->tuote as $key => $tuoteID) {
                DB::table('vuokrausrivi')->insert([
                    'vuokrausID' => $vuokrausID,
                    'tuoteID' => $tuoteID,
                    'alkamisaika' => $request->alkamisaika[$key],
                    'paattymisaika' => $request->paattymisaika[$key],
                    'hinta' => $request->hinta[$key],
                ]);
            }

        });

        return redirect()->route('vuokraus.lomake')->with('success', 'Vuokraus tallennettu onnistuneesti!');
>>>>>>> origin/main
    }
}
