<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VuokrausController extends Controller
{

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
    {
        $request->validate([
            'asiakasID' => 'required|exists:asiakas,id',
            'vuokrauspvm' => 'required|date',
            'palautuspvm' => 'nullable|date|after_or_equal:vuokrauspvm',
            'tuote.*' => 'required|exists:tuote,tuoteID',
            'alkamisaika.*' => 'required|date',
            'paattymisaika.*' => 'required|date|after_or_equal:alkamisaika.*',
            'hinta.*' => 'required|numeric',
        ]);

        DB::transaction(function () use ($request) {
            $kokonaishinta = array_sum($request->hinta);

            $vuokrausID = DB::table('vuokraus')->insertGetId([
                'asiakasID' => $request->asiakasID,
                'vuokrauspvm' => $request->vuokrauspvm,
                'palautuspvm' => $request->palautuspvm,
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
    }
}
