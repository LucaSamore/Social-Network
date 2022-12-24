<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public routes
Route::view('/', 'welcome')->name('welcome');
Route::view('/login', 'test.login')->name('login');
Route::view('/register', 'test.register')->name('register');
Route::view('/upload', 'test.upload')->name('upload');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/upload', [MediaController::class, 'upload']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::view('/home', 'test.home')->name('home');
    Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::fallback(fn() => view('test.fallback'));