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

Route::get('/',          'LifespanController@index')->name('index');
Route::get('/age',       'LifespanController@age')->name('age');
Route::post('/age',      'LifespanController@age')->name('age');
Route::post('/lifespan', 'LifespanController@lifespan')->name('lifespan');

//Route::get('/lifespan', 'LifespanController@lifespan')->name('lifespan'); //あとで消す