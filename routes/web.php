<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsiakasController;

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

