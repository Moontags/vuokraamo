<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsiakasController;
use App\Http\Controllers\TuoteController;
use App\Http\Controllers\MyyjaController;
use App\Http\Controllers\VuokrausController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Juuripolku
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Asiakas
Route::resource('asiakas', AsiakasController::class);
// Route::get('asiakas/{asiakas}/edit', [AsiakasController::class, 'edit'])->name('asiakas.edit');
// Route::get('/asiakas/{asiakas}', [AsiakasController::class, 'show'])->name('asiakas.show');
// Route::delete('/asiakas/{asiakas}', [AsiakasController::class, 'destroy'])->name('asiakas.destroy');
// Route::get('/asiakas/create', [AsiakasController::class, 'create'])->name('asiakas.create');

// Tuote
Route::resource('tuote', TuoteController::class);
Route::get('tuote/{tuote}/edit', [TuoteController::class, 'edit'])->name('tuote.edit');
Route::get('/tuote/create', [TuoteController::class, 'create'])->name('tuote.create');
Route::post('/tuote', [TuoteController::class, 'store'])->name('tuote.store');
Route::put('/tuote/{tuote}', [TuoteController::class, 'update'])->name('tuote.update');


// Myyjä
Route::resource('myyja', MyyjaController::class);

// Vuokraus
Route::resource('vuokraus', VuokrausController::class);
Route::get('/vuokraus', [VuokrausController::class, 'index'])->name('vuokraus.index');
Route::get('/vuokraus/create', [VuokrausController::class, 'create'])->name('vuokraus.create');
Route::post('/vuokraus', [VuokrausController::class, 'store'])->name('vuokraus.store');
Route::get('/vuokralla', [VuokrausController::class, 'vuokralla'])->name('vuokraus.vuokralla');
Route::get('/vuokraus/create/{tuoteID?}', [VuokrausController::class, 'create'])->name('vuokraus.create');


// Kirjautumislomake
Route::get('/kirjaudu', [AuthController::class, 'loginForm'])->name('kirjaudu');

// Kirjautumisen käsittely
Route::post('/kirjaudu', [AuthController::class, 'authenticate'])->name('kirjaudu.post');

// Uloskirjautuminen
Route::post('/ulos', [AuthController::class, 'logout'])->name('ulos');

