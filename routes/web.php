<?php

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


Route::get('/', 'PagesController@index');


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/search', 'PostsController@search');
Route::resource('posts', 'PostsController');
Route::get('/pdf', 'PDF\TestPDF@generate')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
