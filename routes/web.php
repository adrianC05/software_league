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

Route::group(['prefix' => 'admin'], function () {
    Route::get('Panel-Administrativo', [IndexController::class, 'index'])->name('dashboard');
    Route::get('teams', [TeamsController::class, 'render'])->name('teams');
});
