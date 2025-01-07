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
        return view('auth.login');
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
        // Kirjaa käyttäjä ulos
        Auth::logout();

        // Tyhjennä istunto
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->forget('kirjautunut');
        $request->session()->forget('kayttajatunnus');

        return redirect('/kirjaudu')->with('success', 'Uloskirjautuminen onnistui!');
    }

    /**
     * Tarkista käyttäjän kirjautumisstatus.
     */
    public static function tarkistaKirjautuminen()
    {
        return AppHelper::tarkistaKirjautuminen();
    }
}
