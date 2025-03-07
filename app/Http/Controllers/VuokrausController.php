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
        $tuoteID = $tuoteID ?? $request->query('tuoteID');

        if (!$tuoteID) {
            return redirect()->route('tuote.index')->withErrors(['error' => 'Valitse ensin auto vuokrattavaksi.']);
        }

        $tuote = DB::table('tuote')->where('tuoteID', $tuoteID)->first();
        if (!$tuote) {
            return redirect()->route('tuote.index')->withErrors(['error' => 'Valittua autoa ei löytynyt.']);
        }

        $asiakkaat = DB::table('asiakas')
            ->select('id', DB::raw("CONCAT(etunimi, ' ', sukunimi) AS nimi"))
            ->get();

        return view('vuokraus.create', compact('asiakkaat', 'tuote'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asiakas_status' => 'required',
            'puhelin' => 'nullable|string|max:15',
            'vuokrauspvm' => 'required|date',
            'palautuspvm' => 'nullable|date|after_or_equal:vuokrauspvm',
            'tuotteet' => 'required|array',
            'tuotteet.*' => 'exists:tuote,tuoteID',
            'kuva' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::transaction(function () use ($request) {

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
                $asiakas = DB::table('asiakas')->where('puhelin', $request->puhelin)->first();
                if (!$asiakas) {
                    throw new \Exception('Tunnistetiedot eivät täsmää.');
                }
                $asiakasID = $asiakas->id;
            }

            // 📌 Vuokrauksen tallennus
            $vuokrausID = DB::table('vuokraus')->insertGetId([
                'asiakasID' => $asiakasID,
                'vuokrauspvm' => $request->vuokrauspvm,
                'palautuspvm' => $request->palautuspvm,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($request->tuotteet as $tuoteID) {
                $tuote = DB::table('tuote')->where('tuoteID', $tuoteID)->first();
                $hinta = $tuote ? $tuote->hinta : 0.00;
                $kuvaPolku = $tuote->kuva;


                if ($request->hasFile('kuva')) {
                    $kuvaPolku = $request->file('kuva')->store('tuotekuvat', 'public');

                    DB::table('tuote')->where('tuoteID', $tuoteID)->update([
                        'kuva' => $kuvaPolku,
                    ]);
                }


                DB::table('vuokrausrivi')->insert([
                    'vuokrausID' => $vuokrausID,
                    'tuoteID' => $tuoteID,
                    'alkamisaika' => $request->vuokrauspvm,
                    'paattymisaika' => $request->palautuspvm,
                    'maara' => $request->input('maara', 1),
                    'hinta' => $hinta,
                    'kuva' => $kuvaPolku,
                    'palautettu' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        return redirect()->route('vuokraus.create', ['tuoteID' => $request->tuotteet[0]])
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
