<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockCustomer
{
    public function handle(Request $request, Closure $next)
    {
        // Tässä vaiheessa EI rajoiteta mitään -> Kaikki käyttäjät, mukaan lukien vierailijat, saavat täydet oikeudet.
        return $next($request);
    }
}
