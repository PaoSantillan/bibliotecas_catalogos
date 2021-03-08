<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\GeneralException;
use App\Content;
use App\Course;
use App\User;

class ContenidoController extends Controller
{
    /**
     * Devuelve el listado de los contenidos disponibles.
     *
     * @return view
     */
    public function index()
    {
        $result = Content::orderBy('id', 'desc')->get();
        return view('contenidos.index', ['contenidos' => $result]);
    }


    /**
     * Devuelve el listado de los contenidos disponibles para el alumno.
     *
     * @return view
     */
    public function indexAlumno(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        $ids_cursos = [];
        foreach($user->curso as $curso){
            $ids_cursos[] = $curso->id;
        }
        $contenidos = Content::whereIn('course_id', $ids_cursos)->get();
        return view('contenidos.alumnos.index', ['contenidos' => $contenidos]);
    }

    /**
     * Muestra el formulario para crear una clase.
     *
     * @return view
     */
    public function create()
    {
        $result = Course::all();
        return view('contenidos.crearcontenido', ['cursos' => $result]);
    }

    /**
     * Guarda un contenido en la base de datos.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attached' => 'bail|required',
            'course_id' => 'bail|required'
        ]);

        if ($validator->fails()) {
            return redirect('/crearcontenido')
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $file_name = NULL;
            //Guardamos el archivo en local, en una carpeta de contenidos
            if($request->hasFile('attached')){
                $file_name = $request->file('attached')->getClientOriginalName();
                Storage::disk('local')->putFileAs('contenidos/', $request->file('attached'), $file_name);
            }
            $contenido = Content::create([
                'course_id' =>  $request->course_id,
                'attached' => $file_name,
                'name' => $file_name,
                'created_user_id' => $request->user()->id,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al registrar el contenido, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'El contenido fue creado satisfactoriamente.');
        return redirect()->action('ContenidoController@index');
    }

    /**
     * Muestra el formulario para editar un contenido.
     *
     * @param  $id
     * @return view
     */
    public function edit($id){
        $cursos = Course::all();
        $contenido = Content::findOrFail($id);
        return view('contenidos.editarcontenido',['contenido' => $contenido, 'cursos' => $cursos]);
    }

    /**
     * Actualiza el contenido.
     *
     * @param  Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'attached' => 'bail|required',
            'course_id' => 'bail|required'
        ]);

        if ($validator->fails()) {
            return redirect('/editarcontenido/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {

            $contenido = Content::findOrFail($id);
            $file_name = $contenido->attached;

            //Si mandó un archivo (reemplazar el anterior)
            if($request->hasFile('attached')){
                //Borramos el contenido viejo
                Storage::disk('local')->delete('/contenidos/' .$file_name);
                //Nuevo contenido
                $file_name = $request->file('attached')->getClientOriginalName();
                //Guardamos el nuevo contenido
                Storage::disk('local')->putFileAs('contenidos/', $request->file('attached'), $file_name);
            }

            $contenido->course_id = $request->course_id;
            $contenido->attached = $file_name;
            $contenido->name = $file_name;

            $contenido->save();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al modificar el contenido, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'El contenido fue modificado satisfactoriamente.');
        return redirect()->action('ContenidoController@index');
    }

    /**
     * Elimina un contenido.
     *
     * @param  Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){

        DB::beginTransaction();
        try {
            $contenido = Content::findOrFail($id);
            $contenido->delete();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al eliminar el contenido, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'El contenido fue eliminado satisfactoriamente.');
        return redirect()->action('ContenidoController@index');
    }

    /**
     * Devuelve un archivo en local para descargar
     * 
     * @param  $archivo
     * @return Storage 
     */
    public function displayFile($archivo){
        return Storage::disk('local')->download('contenidos/'.$archivo);
    }
}