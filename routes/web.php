<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FilmController;

use Illuminate\Support\Facades\Storage;
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

Route::get('/', [FilmController::class, 'index'])->name('film.index');

Route::get('/create_file', function () {
    Storage::disk('local')->put('myfile.txt', 'First file in filesystem');
    return 'File created';
});

Route::get('/{film}', [FilmController::class, 'details'])->name('film.details');


Route::get('/film/create', [FilmController::class, 'create'])->name('film.create');
Route::post('/film/create', [FilmController::class, 'store'])->name('film.store');
