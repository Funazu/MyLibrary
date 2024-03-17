<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
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
    Route::put('/dashboard/genre/edit/{genre:slug}', [GenreController::class, 'editGenre']);
    Route::post('/dashboard/genre/delete/{genre:slug}', [GenreController::class, 'deleteGenre']);

    // Author
    Route::get('/dashboard/author', [AuthorController::class, 'index'])->name('author');
    Route::get('/dashboard/author/checkSlug', [AuthorController::class, 'checkSlug']);
    Route::post('/dashboard/author/create', [AuthorController::class, 'createAuthor']);
    Route::put('/dashboard/author/edit/{author:slug}', [AuthorController::class, 'editAuthor']);
    Route::post('/dashboard/author/delete/{author:slug}', [AuthorController::class, 'deleteAuthor']);
});
