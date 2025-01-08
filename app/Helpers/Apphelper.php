<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class AppHelper
{
    /**
     * Tarkista, onko käyttäjä kirjautunut sisään.
     */
    public static function tarkistaKirjautuminen()
    {
        return Auth::check();
    }
}
