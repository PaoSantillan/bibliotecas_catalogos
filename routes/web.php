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

Auth::routes();

//Index
Route::get('/', 'IndexController@index')->name('index');

//Login
Route::get('/login', function(){
    return view('login');
})->middleware('guest');

Route::post('login', 'Auth\LoginController@login')->name('login')->middleware('guest');

//Logout
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Ejemplares
Route::get('ejemplares', 'EjemplarController@index');

//Socios
Route::get('socios', 'SocioController@index');
Route::get('socios/carnet/{id}', 'SocioController@showCarnet');


