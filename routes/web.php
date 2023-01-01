<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
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
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/', [FeedController::class, 'feed'])->name('home');
    Route::get('/home', [FeedController::class, 'feed'])->name('home');
    Route::get('/like/{post_id}', [PostController::class, 'like'])->name('post.like');
    Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::fallback(fn() => view('fallback'));