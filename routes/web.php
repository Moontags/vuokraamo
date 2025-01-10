  <?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsiakasController;
use App\Http\Controllers\TuoteController;
use App\Http\Controllers\MyyjaController;
use App\Http\Controllers\VuokrausController;

Route::get('/', function () {
    return view('welcome');
});

// Asiakas
Route::resource('asiakas', AsiakasController::class);
Route::get('asiakas/{asiakas}/edit', [AsiakasController::class, 'edit'])->name('asiakas.edit');
Route::get('/asiakas/{asiakas}', [AsiakasController::class, 'show'])->name('asiakas.show');
Route::delete('/asiakas/{asiakas}', [AsiakasController::class, 'destroy'])->name('asiakas.destroy');

// Tuote
Route::resource('tuote', TuoteController::class);

// Myyjä
Route::resource('myyja', MyyjaController::class);

// Vuokraus
Route::resource('vuokraus', VuokrausController::class);









