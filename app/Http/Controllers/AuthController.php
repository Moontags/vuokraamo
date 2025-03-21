<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\AppHelper;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('vuokraus.index')->with('success', 'Olet nyt kirjautunut onnistuneesti!');
        }

        return back()->withErrors([
            'email' => 'Käyttäjätunnus tai salasana on virheellinen.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Uloskirjautuminen onnistui!');
    }

    public static function tarkistaKirjautuminen()
    {
        return AppHelper::tarkistaKirjautuminen();
    }
}
