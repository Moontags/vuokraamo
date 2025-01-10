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

// Tuote
Route::resource('tuote', TuoteController::class);

// Myyjä
Route::resource('myyja', MyyjaController::class);

// Vuokraus
Route::resource('vuokraus', VuokrausController::class);









