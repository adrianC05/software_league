<?php
use App\Livewire\TeamsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\IndexController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('Panel-Administrativo', [IndexController::class, 'index'])->name('dashboard');
    Route::get('teams', [TeamsController::class, 'render'])->name('teams.index');
});
Route::get('/descargar-pdf', function () {
    $archivoPdf = public_path('descargas/protocolo_software_league.pdf');
    return response()->download($archivoPdf, 'Protocolo_software_league.pdf');
});
Route::get('/descargar1-pdf', function () {
    $archivoPdf = public_path('descargas/Plantillas.pdf');
    return response()->download($archivoPdf, 'Plantilla de incripción.pdf');
});
