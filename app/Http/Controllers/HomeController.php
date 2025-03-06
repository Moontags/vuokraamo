<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome'); // Varmista, että `resources/views/home.blade.php` on olemassa
    }
}
