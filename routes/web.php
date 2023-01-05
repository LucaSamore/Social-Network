<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    Route::get('/', [FeedController::class, 'feed'])->name('root');
    Route::get('/home', [FeedController::class, 'feed'])->name('home');
    Route::get('/profile/{username}', [ProfileController::class, 'profile'])->name('user.profile');
    Route::get('/like/{post_id}', [PostController::class, 'like'])->name('post.like');
    Route::get('/{username}/posts', [PostController::class, 'index'])->name('post.index');
    Route::post('/posts/store', [PostController::class, 'store'])->name('post.store');
    Route::post('/follow', [UserController::class, 'follow'])->name('user.follow');
    Route::post('comment/{post_id}/create', [CommentController::class, 'store'])->whereUuid('post_id')->name('comment.store');
    Route::delete('/unfollow', [UserController::class, 'unfollow'],)->name('user.unfollow');
    Route::delete('/post/delete', [PostController::class, 'destroy'])->name('post.delete');
    Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::fallback(fn() => view('fallback'));