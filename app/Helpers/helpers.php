<?php

if (!function_exists('tarkistaKirjautuminen')) {
    function tarkistaKirjautuminen()
    {
        return \Illuminate\Support\Facades\Session::get('kirjautunut', false);
    }
}
