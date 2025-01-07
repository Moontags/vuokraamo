<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsiakasController;

Route::get('/', function () {
    return view('welcome');
});
// Asiakas-reitit
Route::get('asiakas', [AsiakasController::class, 'index'])->name('asiakas.index'); // Näytä kaikki asiakkaat
Route::get('asiakas/create', [AsiakasController::class, 'create'])->name('asiakas.create'); // Luo uusi asiakas
Route::post('asiakas', [AsiakasController::class, 'store'])->name('asiakas.store'); // Tallenna uusi asiakas
Route::get('asiakas/{asiakas}', [AsiakasController::class, 'show'])->name('asiakas.show'); // Näytä yksittäinen asiakas
Route::get('asiakas/{asiakas}/edit', [AsiakasController::class, 'edit'])->name('asiakas.edit'); // Muokkaa asiakasta
Route::put('asiakas/{asiakas}', [AsiakasController::class, 'update'])->name('asiakas.update'); // Päivitä asiakas
Route::delete('asiakas/{asiakas}', [AsiakasController::class, 'destroy'])->name('asiakas.destroy'); // Poista asiakas

