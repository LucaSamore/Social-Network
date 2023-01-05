<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


/* route that will return a view instructing the user to click the email verification link that was emailed to them 
   by Laravel after registration.*/
/*
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
*/
/* route that will handle requests generated when the user clicks the email verification link that was emailed to them*/
/*
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
*/
/* route to allow the user to request that the verification email be resent*/
/*
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
*/
/*
Route::get('/email', function(){
    return new VerifyEmail();
});*/


Route::fallback(fn() => view('fallback'));