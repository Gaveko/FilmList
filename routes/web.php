<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FilmController;
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

Route::get('/', [FilmController::class, 'index'])->name('film-index');
Route::get('/{id}', [FilmController::class, 'details'])->name('film-details');


Route::get('/film/create', [FilmController::class, 'createForm'])->name('film-create-form');
Route::post('/film/create', [FilmController::class, 'create'])->name('film-create');
