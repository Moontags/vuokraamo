<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        return route('kirjaudu'); // Ohjaa kirjautumissivulle
    }
        // Vierailijat ja asiakkaat pääsevät ilman kirjautumista
        return null;
    }
}
