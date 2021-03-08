<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Lesson;
use App\Course;
use App\User;
use App\CommentLesson;
use Auth;

class ClaseController extends Controller
{
    /**
     * Devuelve el listado de las clases disponibles.
     *
     * @return view
     */
    public function index()
    {
        $result = Lesson::orderBy('id', 'desc')->get();
        return view('clases.index', ['clases' => $result]);
    }

    /**
     * Devuelve el listado de las clases disponibles para el alumno.
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
        $clases = Lesson::whereIn('course_id', $ids_cursos)->get();
        return view('clases.alumnos.index', ['clases' => $clases]);
    }

    /**
     * Muestra el formulario para crear una clase.
     *
     * @return view
     */
    public function create()
    {
        $result = Course::all();
        return view('clases.crearclase', ['cursos' => $result]);
    }

    /**
     * Guarda una clase en la base de datos.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'link' => 'bail|required',
            'name' => 'bail|required|max:250',
            'course_id' => 'bail|required'
        ]);

        if ($validator->fails()) {
            return redirect('/crearclase')
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $clase = Lesson::create([
                'name' => $request->name,
                'link' => $request->link,
                'open' => $request->open,
                'course_id' =>  $request->course_id,
                'description' => $request->description
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al registrar la clase, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'La clase fue creada satisfactoriamente.');
        return redirect()->action('ClaseController@index');
    }

    /**
     * Muestra el formulario para editar una clase.
     *
     * @param  $id
     * @return view
     */
    public function edit($id){
        $cursos = Course::all();
        $clase = Lesson::findOrFail($id);
        return view('clases.editarclase',['clase' => $clase, 'cursos' => $cursos]);
    }

    /**
     * Clases para los alumnos.
     *
     * @param  $id
     * @return view
     */
    public function showAlumno($idCurso, $idClase = 1){
        $curso = Course::findOrFail(decrypt($idCurso));
        $clase = Lesson::findOrFail($idClase);
        return view('clases.alumnos.show',['curso' => $curso, 'clase' => $clase, 'comentarios' => $clase->comentarios]);
    }

    /**
     * Cambia la clase.
     *
     * @param  Request
     * @param  $id
     * @return view
     */
    public function changeClass(Request $request, $id){
        $curso = Course::findOrFail(decrypt($id));
        $clase = Lesson::findOrFail($request->lesson_id);
        return view('clases.alumnos.show',['curso' => $curso, 'clase' => $clase, 'comentarios' => $clase->comentarios]);
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
            'link' => 'bail|required',
            'name' => 'bail|required|max:250',
            'course_id' => 'bail|required'
        ]);

        if ($validator->fails()) {
            return redirect('/editarclase/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $clase = Lesson::findOrFail($id);
            $clase->name = $request->name;
            $clase->link = $request->link;
            $clase->open = $request->open;
            $clase->course_id =  $request->course_id;
            $clase->description = $request->description;
            $clase->save();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al modificar la clase, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'La clase fue modificada satisfactoriamente.');
        return redirect()->action('ClaseController@index');
    }

    /**
     * Elimina una clase.
     *
     * @param  Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){

        DB::beginTransaction();
        try {
            $clase = Lesson::findOrFail($id);
            $clase->delete();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al eliminar la clase, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'La clase fue eliminada satisfactoriamente.');
        return redirect()->action('ClaseController@index');
    }

    /**
     * Guarda un comentario en la base de datos.
     *
     * @param Request $request
     * @param $idClase
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request, $idClase)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'bail|required',
            'comment' => 'bail|required'
        ]);

        
        if ($validator->fails()) {
            return redirect('/indexclasesalumno')
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $comentario = CommentLesson::create([
                'title' => $request->title,
                'comment' => $request->comment,
                'user_id' => $request->user()->id,
                'lesson_id' =>  $idClase,
                'status' => 0 //Desactivado
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al registrar el comentario, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        if(Auth::user()->hasRole('alumno')){
            $request->session()->flash('mensaje-success', 'El comentario fue agregado exitosamente. Podrá visualizarlo cuando se apruebe desde la administración.');
            return redirect()->action('ClaseController@indexAlumno');
        }else{
            $request->session()->flash('mensaje-success', 'El comentario fue agregado exitosamente. Podrá visualizarlo cuando se apruebe desde la administración.');
            return redirect()->action('ClaseController@index');
        }
    }

    /**
     * Devuelve el listado de los comentarios.
     *
     * @param $idClase
     * @return view
     */
    public function indexComentarios($idClase)
    {
        $clase = Lesson::findOrFail($idClase);
        return view('clases.comentarios.index', ['clase' => $clase]);
    }

    /**
     * Cambia el estado de un comentario.
     *
     * @param $idComentario
     * @return view
     */
    public function cambiarEstado($idComentario)
    {
        DB::beginTransaction();
        try {
            $comentario = CommentLesson::findOrFail($idComentario);
            $comentario->status = $comentario->status == 1 ? 0 : 1;
            $comentario->save();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al registrar el comentario, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $clase = Lesson::findOrFail($comentario->clase->id);

        return view('clases.comentarios.index', ['clase' => $clase]);
    }
}
