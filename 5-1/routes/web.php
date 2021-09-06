<?php

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
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

    Route::get('/', 'PostController@index')->middleware('auth'); //viewを表示するもの
    Route::post('index/create', 'PostController@create')->middleware('auth'); //情報を送るもの
    Route::get('destroy', 'PostController@destroy')->name('posts.destory')->middleware('auth');
    



// Route::get('/home', 'HomeController@index')->name('home');

