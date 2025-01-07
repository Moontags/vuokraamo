<?php

namespace App\Helpers;

class AppHelper
{
    public static function tarkistaKirjautuminen(): bool
    {
        return isset($_SESSION['kirjautunut']) && $_SESSION['kirjautunut'] === true;
    }
}
