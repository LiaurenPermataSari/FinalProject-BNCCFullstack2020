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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'PagesController@index');
Route::post('/home','PagesController@store');
Route::get('/post/{pertanyaan_id}','PagesController@show');
Route::post('/post/{pertanyaan_id}','AnswerController@store');
