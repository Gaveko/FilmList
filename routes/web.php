<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FilmController;
use App\Http\Controllers\Auth;

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

Route::post('/review', [FilmController::class, 'sendReview'])->name('review');
Route::post('/evaluate', [FilmController::class, 'evaluate'])->name('evaluate');

Route::get('/film/create', [FilmController::class, 'create'])->name('film.create');
Route::post('/film/create', [FilmController::class, 'store'])->name('film.store');

Route::prefix('/auth')->group(function () {
    Route::get('/register', function () {
        return view('auth.register');
    })->name('auth.register');

    Route::post('/register', [Auth\RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('auth.login');

    Route::post('/login', [Auth\LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::post('/logout', [Auth\LogoutController::class, 'logout'])->name('logout');
});