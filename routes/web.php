<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsiakasController;
use App\Http\Controllers\MyyjaController;
use App\Http\Controllers\TuoteController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Helpers\AppHelper;

Route::get('/', function () {
    return view('welcome');
});

Route::get('asiakas', [AsiakasController::class, 'index'])->name('asiakas.index');
Route::get('asiakas/create', [AsiakasController::class, 'create'])->name('asiakas.create');
Route::post('asiakas', [AsiakasController::class, 'store'])->name('asiakas.store');
Route::get('asiakas/{asiakas}', [AsiakasController::class, 'show'])->name('asiakas.show');
Route::get('asiakas/{asiakas}/edit', [AsiakasController::class, 'edit'])->name('asiakas.edit');
Route::put('asiakas/{asiakas}', [AsiakasController::class, 'update'])->name('asiakas.update');
Route::delete('asiakas/{asiakas}', [AsiakasController::class, 'destroy'])->name('asiakas.destroy');
Route::resource('asiakas', AsiakasController::class)->parameters(['asiakas' => 'id',]);
Route::resource('tuote', TuoteController::class)->parameters(['tuote' => 'tuoteID']);
Route::resource('tuote', TuoteController::class);
Route::resource('myyja', MyyjaController::class);
Route::delete('myyja/{myyja}', [MyyjaController::class, 'destroy'])->name('myyja.destroy');
Route::get('/kirjaudu', [AuthController::class, 'loginForm'])->name('kirjaudu');
Route::post('/kirjaudu', [AuthController::class, 'authenticate'])->name('kirjaudu.post');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');





// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AsiakasController;
// use App\Http\Controllers\MyyjaController;
// use App\Http\Controllers\TuoteController;
// use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('asiakas', AsiakasController::class)->parameters(['asiakas' => 'id',]);
// Route::get('asiakas', [AsiakasController::class, 'index'])->name('asiakas.index');
// Route::get('asiakas/create', [AsiakasController::class, 'create'])->name('asiakas.create');
// Route::post('asiakas', [AsiakasController::class, 'store'])->name('asiakas.store');
// Route::get('asiakas/{asiakas}', [AsiakasController::class, 'show'])->name('asiakas.show');
// Route::get('asiakas/{asiakas}/edit', [AsiakasController::class, 'edit'])->name('asiakas.edit');
// Route::put('asiakas/{asiakas}', [AsiakasController::class, 'update'])->name('asiakas.update');
// Route::delete('asiakas/{asiakas}', [AsiakasController::class, 'destroy'])->name('asiakas.destroy');

// Route::resource('tuote', TuoteController::class)->parameters(['tuote' => 'tuoteID']);
// Route::resource('tuote', TuoteController::class);

// Route::resource('myyja', MyyjaController::class);

// Route::get('/kirjaudu', [AuthController::class, 'loginForm'])->name('kirjaudu');
// Route::post('/kirjaudu', [AuthController::class, 'authenticate'])->name('kirjaudu.post');

// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
