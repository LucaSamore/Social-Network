<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
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
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/', [FeedController::class, 'feed'])->name('root');
    Route::get('/home', [FeedController::class, 'feed'])->name('home');
    Route::get('/profile/{username}', [ProfileController::class, 'profile'])->name('user.profile');
    Route::get('/like/{post_id}', [PostController::class, 'like'])->name('post.like');
    Route::get('/{username}/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/{username}/notifications', [NotificationController::class, 'show'])->name('notifications.show');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/search/user', [SearchController::class, 'search'])->name('user.search');
    Route::get('/settings', [SettingsController::class, 'settings'])->name('settings');
    Route::post('/posts/store', [PostController::class, 'store'])->name('post.store');
    Route::post('/follow', [UserController::class, 'follow'])->name('user.follow');
    Route::post('comment/create', [CommentController::class, 'store'])->name('comment.store');
    Route::put('/comment/update', [CommentController::class, 'update'])->name('comment.update');
    Route::put('/post/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/unfollow/{my_username}/{other_username}', [UserController::class, 'unfollow'],)->name('user.unfollow');
    Route::delete('/post/delete/{post_id}', [PostController::class, 'destroy'])->whereUuid('post_id')->name('post.delete');
    Route::delete('/comment/delete/{comment_id}', [CommentController::class, 'destroy'])->whereUuid('comment_id')->name('comment.delete');
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

Route::controller(BookmarkController::class)->group(function () {

    Route::get('/bookmarks/', 'show');
    Route::get('/bookmarks/{post}', 'store');
    Route::get('/bookmarksDelete/{bookmark}', 'destroy');
    Route::get('/bookmarksExist/{post}', 'isABookmark');
});

Route::fallback(fn() => view('fallback'));