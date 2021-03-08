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

/*
|--------------------------------------------------------------------------
| Rutas sin middleware
|--------------------------------------------------------------------------
*/
//Index
Route::get('/', 'IndexController@index')->name('index');

//Logout
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Ruta landing cursos
Route::get('landingCursos', 'CursoController@index')->name('listCursos');

/*
|--------------------------------------------------------------------------
| Rutas middleware guest
|--------------------------------------------------------------------------
*/

Route::get('/login', function(){
    return view('login');
})->middleware('guest');

Route::post('login', 'Auth\LoginController@login')->name('login')->middleware('guest');

/*
|--------------------------------------------------------------------------
| Rutas middleware auth. 
|--------------------------------------------------------------------------
*/
//Home
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Rutas middleware auth. Rol alumno.
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => ['auth', 'role:alumno'],
], function () {
    //Rutas cursos
    Route::get('indexcursosalumno', 'CursoController@indexAlumno')->name('indexCursosAlumno');

    //Rutas clases
    Route::get('indexclasesalumno', 'ClaseController@indexAlumno')->name('indexClasesAlumno');

    //Rutas contenidos
    Route::get('indexcontenidosalumno', 'ContenidoController@indexAlumno')->name('indexContenidosAlumno');
});

/*
|--------------------------------------------------------------------------
| Rutas middleware auth. Roles Super admin, admin, moderador, profesor y alumno.
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => ['auth', 'role:super,admin,mod,profesor,alumno'],
], function () {
   //Rutas clases
    Route::get('mostrarclases/{idCurso}/{idClase?}', 'ClaseController@showAlumno')->name('mostrarClaseAlumno');
    Route::post('cambiarclase/{id}', 'ClaseController@changeClass')->name('cambiarClaseAlumno');

    //Rutas comentarios
    Route::post('crearcomentario/{idClase}', 'ClaseController@storeComment')->name('createComentario');
});

/*
|--------------------------------------------------------------------------
| Rutas middleware auth. Roles Super Admin, Admin, Moderador
|--------------------------------------------------------------------------
*/
//Ruta profesor
Route::resource('profesores', 'ProfesorController')->middleware(['auth', 'role:super,admin,mod,profesor']);

//Ruta alumnos
Route::resource('alumnos', 'AlumnosController')->middleware(['auth', 'role:super,admin,mod,profesor']);

//Transferencias
Route::get('comprobantes', 'TransferenciasController@index')->middleware(['auth', 'role:super,admin,mod,profesor']);
Route::get('comprobantes/aprobar/{id}', 'TransferenciasController@aprobar')->middleware(['auth', 'role:super,admin,mod,profesor']);

//Ruta usuarios
Route::get('usuario/name/{name}', 'UsuarioController@usuario')->middleware('guest');
Route::get('usuario/cookie/reset/{id}', 'UsuarioController@resetCookie')->middleware('auth');
Route::get('usuario/cookie1/reset/{id}', 'UsuarioController@resetCookie1')->middleware('auth');