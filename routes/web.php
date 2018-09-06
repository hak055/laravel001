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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'CategoryController@index')->name('home');

Route::get('/create', 'CategoryController@create')->name('create_category');

Route::post('/home', 'CategoryController@store');

Route::get('/show/{id}', 'CategoryController@show')->name('show_category');


Route::get('/home/{category}/edit', 'CategoryController@edit')->name('edit_category');

Route::patch('/home/{category}', 'CategoryController@update');



Route::delete('/home/{category}', 'CategoryController@destroy');
