<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VuokraController extends Controller
{
    public function index()
    {
        $vuokralla = DB::table('asiakas')
            ->join('vuokraus', 'asiakas.id', '=', 'vuokraus.asiakasID') // Päivitetty asiakas.id
            ->join('vuokrausrivi', 'vuokraus.id', '=', 'vuokrausrivi.vuokrausID') // Päivitetty vuokraus.id
            ->join('tuote', 'vuokrausrivi.tuoteID', '=', 'tuote.tuoteID')
            ->select(
                DB::raw("CONCAT(asiakas.etunimi, ' ', asiakas.sukunimi) as asiakas"),
                'tuote.nimi as tuote',
                'vuokrausrivi.alkamisaika',
                'vuokrausrivi.paattymisaika',
                'vuokrausrivi.vuokrausriviID'
            )
            ->whereNull('vuokrausrivi.palautettu')
            ->get();

        return view('vuokralla', compact('vuokralla'));
    }

    public function update(Request $request)
    {
        $vuokrausriviIDs = $request->input('vuokrausriviID');

        if (!empty($vuokrausriviIDs)) {
            DB::table('vuokrausrivi')
                ->whereIn('vuokrausriviID', $vuokrausriviIDs)
                ->update(['palautettu' => 1]);

            return redirect()->route('vuokralla.index')->with('success', 'Tuotteet palautettu onnistuneesti!');
        }

        return redirect()->route('vuokralla.index')->with('success', 'Ei valittuja tuotteita palautukseen.');
    }
}
