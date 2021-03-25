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
Route::get('home', 'IndexController@index')->name('index');

//Login
Route::get('/login', function(){
    return view('auth.login');
})->middleware('guest');

Route::post('login', 'Auth\LoginController@login')->name('login')->middleware('guest');

//Logout
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Ejemplares
Route::get('ejemplares', 'EjemplarController@index')->middleware(['auth', 'role:super,admin,administrativo']);

//Usuarios
Route::get('usuarios', 'UsuarioController@index')->middleware(['auth', 'role:super,admin']);
Route::get('usuarios/crear', 'UsuarioController@create')->middleware(['auth', 'role:super,admin']);
Route::post('usuarios/crear', 'UsuarioController@store')->middleware(['auth', 'role:super,admin']);
Route::get('usuarios/editar/{id}', 'UsuarioController@edit')->middleware(['auth', 'role:super,admin']);
Route::put('usuarios/editar/{id}', 'UsuarioController@update')->middleware(['auth', 'role:super,admin']);
Route::delete('usuarios/eliminar/{id}', 'UsuarioController@destroy')->middleware(['auth', 'role:super,admin']);


