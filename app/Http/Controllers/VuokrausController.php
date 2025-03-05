<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asiakas;

class VuokrausController extends Controller
{
    public function index()
    {
        $vuokraukset = DB::table('vuokraus')
            ->join('asiakas', 'vuokraus.asiakasID', '=', 'asiakas.id')
            ->select('vuokraus.*', DB::raw("CONCAT(asiakas.etunimi, ' ', asiakas.sukunimi) as asiakas"))
            ->get();

        $tuotteet = DB::table('tuote')
            ->select('tuoteID as id', 'nimi', 'kuvaus', 'kuva')
            ->paginate(3);

        return view('vuokraus.index', compact('vuokraukset', 'tuotteet'));
    }

    public function create(Request $request, $tuoteID = null)
    {
        $asiakkaat = DB::table('asiakas')
            ->select('id', DB::raw("CONCAT(etunimi, ' ', sukunimi) AS nimi"))
            ->get();

        $tuote = null;
        if ($tuoteID) {
            $tuote = DB::table('tuote')->where('tuoteID', $tuoteID)->first();
        }

        return view('vuokraus.create', compact('asiakkaat', 'tuote'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asiakas_status' => 'required', // Asiakkaan tilan tarkistus (uusi vai olemassa oleva)
            'puhelin' => 'nullable|string|max:15', // Puhelinnumero, jos asiakas on olemassa
            'vuokrauspvm' => 'required|date',
            'palautuspvm' => 'nullable|date|after_or_equal:vuokrauspvm',
            'tuotteet' => 'required|array',
            'tuotteet.*' => 'exists:tuote,tuoteID',
        ]);

        // Jos asiakas on uusi, luodaan asiakas
        if ($request->asiakas_status == 'new') {
            $validatedData = $request->validate([
                'etunimi' => 'required|string|max:100',
                'sukunimi' => 'required|string|max:100',
                'sahkoposti' => 'required|email|max:255|unique:asiakas,sahkoposti',
                'lahiosoite' => 'nullable|string|max:100',
                'postinumero' => 'nullable|string|max:5',
                'postitoimipaikka' => 'nullable|string|max:100',
                'puhelin' => 'nullable|string|max:15',
            ]);
            $asiakas = Asiakas::create($validatedData);
            $asiakasID = $asiakas->id;
        } else {
            // Jos asiakas on olemassa, haetaan asiakas puhelinnumeron avulla
            $asiakas = DB::table('asiakas')->where('puhelin', $request->puhelin)->first();
            if (!$asiakas) {
                return redirect()->back()->withErrors(['puhelin' => 'Tunnistetiedot eivät täsmää.']);
            }
            $asiakasID = $asiakas->id;
        }

        DB::transaction(function () use ($request, $asiakasID) {
            // Tallenna vuokraus
            $vuokrausID = DB::table('vuokraus')->insertGetId([
                'asiakasID' => $asiakasID,
                'vuokrauspvm' => $request->vuokrauspvm,
                'palautuspvm' => $request->palautuspvm,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        foreach ($request->tuotteet as $tuoteID) {
            // Haetaan tuotteen hinta
            $tuote = DB::table('tuote')->where('tuoteID', $tuoteID)->first();
            $hinta = $tuote ? $tuote->hinta : 0.00; // Jos hintaa ei löydy, käytetään 0.00

            DB::table('vuokrausrivi')->insert([
                'vuokrausID' => $vuokrausID,
                'tuoteID' => $tuoteID,
                'alkamisaika' => $request->vuokrauspvm,
                'paattymisaika' => $request->palautuspvm,
                'maara' => $request->input('maara', 1),
                'hinta' => $hinta,
                'palautettu' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    });

        return redirect()
            ->route('vuokraus.create', ['tuoteID' => $request->tuotteet[0]])
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
                'tuote.kuva',
                'vuokrausrivi.maara'
            )
            ->paginate(3);

        return view('vuokraus.vuokralla', compact('vuokraukset'));
    }
}
