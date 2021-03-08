<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\GeneralException;
use App\CourseGeneral;
use App\Course;
use App\User;

class CursoGeneralController extends Controller
{
    /**
     * Devuelve el listado de los cursos generales disponibles para la administración.
     *
     * @return view
     */
    public function indexAdmin()
    {
        $result = CourseGeneral::orderBy('id', 'desc')->get();
        return view('cursos-general.index', ['cursos' => $result]);
    }

    /**
     * Muestra el formulario para crear un curso general.
     *
     * @return view
     */
    public function create()
    {
        $cursos = Course::all();
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'profesor')->orWhere('name', 'mod');
        })->get();
        return view('cursos-general.create', ['cursos' => $cursos, 'users' => $users]);
    }

    /**
     * Guarda un curso general en la base de datos.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|max:250',
            'institucion' => 'max:250',
            'code' => 'max:250',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:5120',
            'price_1' => 'integer',
            'price_2' => 'integer'
        ]);

        if ($validator->fails()) {
            return redirect('/crearcursogeneral')
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $file_name = NULL;
            //Si envió imagen de portada la guardamos en public, en una carpeta de cursos
            if($request->hasFile('image')){
                $file_name = $request->file('image')->getClientOriginalName();
                Storage::putFileAs('cursos/', $request->file('image'), $file_name);
            }
            $curso = CourseGeneral::create([
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => $request->user_id,
                'user_description' => $request->user_description,
                'image' => $file_name,
                'institucion' => $request->institucion,
                'code' =>  $request->code,
                'course_id_1' => $request->course_id_1,
                'price_1' => $request->price_1,
                'course_id_2' => $request->course_id_2,
                'price_2' => $request->price_2
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al registrar el promocional, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'El promocional fue creado satisfactoriamente.');
        return redirect()->action('CursoGeneralController@indexAdmin');
    }

    /**
     * Muestra el formulario para editar un curso.
     *
     * @param  $id
     * @return view
     */
    public function edit($id){
        $cursos = Course::all();
        $curso = CourseGeneral::findOrFail($id);
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'profesor')->orWhere('name', 'mod');
        })->get();
        return view('cursos-general.edit',['curso' => $curso, 'users' => $users, 'cursos' => $cursos]);
    }

    /**
     * Actualiza el curso.
     *
     * @param  Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|max:250',
            'institucion' => 'max:250',
            'code' => 'max:250',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:5120',
            'price_1' => 'integer',
            'price_2' => 'integer'
        ]);

        if ($validator->fails()) {
            return redirect('/editarcursogeneral/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $curso = CourseGeneral::findOrFail($id);
            $file_name = $curso->image;

            //Si mandó una imagen (reemplazar la anterior)
            if($request->hasFile('image')){
                //Borramos la imagen vieja
                Storage::disk('public')->delete('/cursos/' .$file_name);
                //Nueva imagen
                $file_name = $request->file('image')->getClientOriginalName();
                //Guardamos la nueva imagen
                Storage::putFileAs('cursos/', $request->file('image'), $file_name);
            }

            $curso->name = $request->name;
            $curso->description = $request->description;
            $curso->user_id = $request->user_id;
            $curso->user_description = $request->user_description;
            $curso->image = $file_name;
            $curso->institucion = $request->institucion;
            $curso->code =  $request->code;
            $curso->course_id_1 = $request->course_id_1;
            $curso->price_1 = $request->price_1;
            $curso->course_id_2 = $request->course_id_2;
            $curso->price_2 = $request->price_2;

            $curso->save();

        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al modificar el promocional, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'El promocional fue modificado satisfactoriamente.');
        return redirect()->action('CursoGeneralController@indexAdmin');
    }

    /**
     * Elimina un curso general.
     *
     * @param  Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        DB::beginTransaction();
        try {
            $curso = CourseGeneral::findOrFail($id);
            $curso->delete();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al eliminar el promocional, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'El promocional fue eliminado satisfactoriamente.');
        return redirect()->action('CursoGeneralController@indexAdmin');
    }
}
