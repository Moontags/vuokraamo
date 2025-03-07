<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsiakasController;
use App\Http\Controllers\TuoteController;
use App\Http\Controllers\MyyjaController;
use App\Http\Controllers\VuokrausController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/kirjaudu', [AuthController::class, 'loginForm'])->name('kirjaudu');
Route::post('/kirjaudu', [AuthController::class, 'authenticate'])->name('kirjaudu.post');
Route::post('/ulos', [AuthController::class, 'logout'])->name('ulos');

Route::resource('asiakas', AsiakasController::class)->only(['index', 'show', 'create', 'store']);
Route::resource('tuote', TuoteController::class);
Route::resource('vuokraus', VuokrausController::class)->only(['index', 'show', 'create', 'store']);


Route::middleware(['auth'])->group(function () {
    Route::resource('asiakas', AsiakasController::class)->except(['index', 'show', 'create', 'store']);
    Route::resource('tuote', TuoteController::class)->except(['index', 'show']);
    Route::resource('myyja', MyyjaController::class);
    Route::resource('vuokraus', VuokrausController::class)->except(['index', 'show', 'create', 'store']);
    Route::get('/vuokralla', [VuokrausController::class, 'vuokralla'])->name('vuokraus.vuokralla');


});

Route::get('/login', function () {
    return redirect()->route('kirjaudu');
})->name('login');

Route::get('/test-role', function () {
    return Auth::user()->role ?? 'vierailija';
});
