<?php

use App\Http\Controllers\AuthController;
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