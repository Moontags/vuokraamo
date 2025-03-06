<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\AppHelper;

class AuthController extends Controller
{
    /**
     * Näytä kirjautumislomake.
     */
    public function loginForm()
    {
        return view('auth.login'); // Varmista, että auth/login.blade.php on olemassa
    }

    /**
     * Käsittele kirjautuminen.
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'kayttajatunnus' => 'required|string',
            'salasana' => 'required|string',
        ]);

        $credentials = [
            'kayttajatunnus' => $request->input('kayttajatunnus'),
            'password' => $request->input('salasana'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('asiakas')->with('success', 'Kirjautuminen onnistui!');
        }

        return back()->withErrors([
            'kayttajatunnus' => 'Käyttäjätunnus tai salasana on virheellinen.',
        ])->onlyInput('kayttajatunnus');
    }

    /**
     * Käsittele uloskirjautuminen.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Uloskirjautuminen onnistui!');
    }

    /**
     * Tarkista käyttäjän kirjautumisstatus.
     */
    public static function tarkistaKirjautuminen()
    {
        return AppHelper::tarkistaKirjautuminen();
    }
}
