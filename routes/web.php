<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
    Route::post('/auth/login/post', [AuthController::class, 'loginPost']);
});

Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'title' => "Dashboard",
            'active' => 'dashboard'
        ]);
    })->name('dashboard');

    // Genre
    Route::get('/dashboard/genre', [GenreController::class, 'index'])->name('genre');
    Route::get('/dashboard/genre/checkSlug', [GenreController::class, 'checkSlug']);
    Route::post('/dashboard/genre/create', [GenreController::class, 'createGenre']);
    Route::put('/dashboard/genre/edit/{genre:id}', [GenreController::class, 'editGenre']);
    Route::post('/dashboard/genre/delete/{genre:id}', [GenreController::class, 'deleteGenre']);
});
