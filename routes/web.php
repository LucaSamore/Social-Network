<?php

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

Route::get('/', function () {
    return view('welcome');
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

/*
Route::get('/post', function () {
    return view('post');
});*/

Route::resource('testPostController', 'App\Http\Controllers\PostController');
/*Route::get('/testPostController', function () {
    return view('post');
});*/