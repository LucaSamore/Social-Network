<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NotificationController;
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
Route::view('/upload', 'test.upload')->name('upload');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/upload/image', [MediaController::class, 'uploadImage']);
Route::post('/upload/video', [MediaController::class, 'uploadVideo']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::view('/', 'home');
    Route::view('/home', 'home')->name('home');
    Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/leftMenu', function () {
    return view('leftMenu');
});

Route::get('/rightMenu', function () {
    return view('rightMenu');
});

Route::get('/testPostView', function () {
    return view('test/testPost');
});

Route::resource('/testPostController', PostController::class);

Route::controller(NotificationController::class)->group(function () {
    //Route::get('/orders/{id}', 'show');
    Route::get('/NotificationControllerLikeToPost/{userDo}/{userReceive}', 'notifyLikeToPost');
    Route::get('/NotificationControllerLikeToComment/{userDo}/{userReceive}', 'notifyLikeToComment');
    Route::get('/NotificationControllerCommentToPost/{userDo}/{userReceive}', 'notifyCommentToPost');
    Route::get('/NotificationControllerFollow/{userDo}/{userReceive}', 'notifyFollow');
    
    Route::get('/Notification/{userId}/{n}', 'show')->whereNumber('n');
});

Route::fallback(fn() => view('fallback'));