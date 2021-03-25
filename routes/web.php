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

//Bibliotecas
Route::get('bibliotecas', 'BibliotecaController@index')->middleware(['auth', 'role:super,admin,administrativo']);
Route::get('bibliotecas/crear', 'BibliotecaController@create')->middleware(['auth', 'role:super,admin,administrativo']);
Route::post('bibliotecas/crear', 'BibliotecaController@store')->middleware(['auth', 'role:super,admin,administrativo']);
Route::get('bibliotecas/editar/{id}', 'BibliotecaController@edit')->middleware(['auth', 'role:super,admin,administrativo']);
Route::put('bibliotecas/editar/{id}', 'BibliotecaController@update')->middleware(['auth', 'role:super,admin,administrativo']);
Route::delete('bibliotecas/eliminar/{id}', 'BibliotecaController@destroy')->middleware(['auth', 'role:super,admin,administrativo']);

//Tipos ejemplares
Route::get('tiposEjemplares', 'TiposController@index')->middleware(['auth', 'role:super,admin,administrativo']);
Route::get('tiposEjemplares/crear', 'TiposController@create')->middleware(['auth', 'role:super,admin,administrativo']);
Route::post('tiposEjemplares/crear', 'TiposController@store')->middleware(['auth', 'role:super,admin,administrativo']);
Route::get('tiposEjemplares/editar/{id}', 'TiposController@edit')->middleware(['auth', 'role:super,admin,administrativo']);
Route::put('tiposEjemplares/editar/{id}', 'TiposController@update')->middleware(['auth', 'role:super,admin,administrativo']);
Route::delete('tiposEjemplares/eliminar/{id}', 'TiposController@destroy')->middleware(['auth', 'role:super,admin,administrativo']);

//Ejemplares
Route::get('catalogo', 'EjemplarController@index');
Route::get('catalogo/ver/{id}', 'EjemplarController@show');

//Ejemplares (admin)
Route::get('ejemplares', 'EjemplarController@indexAdmin')->middleware(['auth', 'role:super,admin,administrativo']);
Route::get('ejemplares/crear', 'EjemplarController@create')->middleware(['auth', 'role:super,admin,administrativo']);
Route::post('ejemplares/crear', 'EjemplarController@store')->middleware(['auth', 'role:super,admin,administrativo']);
Route::get('ejemplares/editar/{id}', 'EjemplarController@edit')->middleware(['auth', 'role:super,admin,administrativo']);
Route::put('ejemplares/editar/{id}', 'EjemplarController@update')->middleware(['auth', 'role:super,admin,administrativo']);
Route::delete('ejemplares/eliminar/{id}', 'EjemplarController@destroy')->middleware(['auth', 'role:super,admin,administrativo']);

//Usuarios
Route::get('usuarios', 'UsuarioController@index')->middleware(['auth', 'role:super,admin']);
Route::get('usuarios/crear', 'UsuarioController@create')->middleware(['auth', 'role:super,admin']);
Route::post('usuarios/crear', 'UsuarioController@store')->middleware(['auth', 'role:super,admin']);
Route::get('usuarios/editar/{id}', 'UsuarioController@edit')->middleware(['auth', 'role:super,admin']);
Route::put('usuarios/editar/{id}', 'UsuarioController@update')->middleware(['auth', 'role:super,admin']);
Route::delete('usuarios/eliminar/{id}', 'UsuarioController@destroy')->middleware(['auth', 'role:super,admin']);


