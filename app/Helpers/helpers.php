<?php

if (!function_exists('tarkistaKirjautuminen')) {
    function tarkistaKirjautuminen()
    {
        return session('kirjautunut', false);
    }
}
