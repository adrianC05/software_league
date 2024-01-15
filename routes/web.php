<?php
use App\Livewire\Teams;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\IndexController;
use App\Livewire\Egresses;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Accedes a las siguientes rutas siempre y cuando estes autenticado
// Accedes a las siguientes rutas siempre y cuando estes autenticado

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'auth'], function () {
    Route::get('Panel-Administrativo', [IndexController::class, 'index'])->name('dashboard');

    // Teams
        Route::get('teams', [Teams::class,  'render'])->name('teams.index.index');

    // Egress
    Route::get('egress', [Egresses::class, 'render'])->name('egress.index');
});
});

Route::get('/descargar-pdf', function () {
    $archivoPdf = public_path('descargas/protocolo_software_league.pdf');
    return response()->download($archivoPdf, 'Protocolo_software_league.pdf');
});
Route::get('/descargar1-pdf', function () {
    $archivoPdf = public_path('descargas/Plantillas.pdf');
    return response()->download($archivoPdf, 'Plantilla de incripción.pdf');
});
