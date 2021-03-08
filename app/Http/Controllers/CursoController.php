<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\CourseGeneral;
use App\Role;
use App\User;
use App\Lesson;
use App\Content;
use App\Transferencias;
use App\CommentCourse;
use DateTime;

class CursoController extends Controller
{
    /**
     * Devuelve el listado de los cursos disponibles y sus comentarios.
     *
     * @return view
     */
    public function index()
    {
        $cursos_generales = CourseGeneral::with('profesor')->where('user_id', '<>', null)->orderBy('id', 'desc')->get();
        $cursos = Course::with('profesor')->where('user_id', '<>', null)->orderBy('id', 'desc')->get();
        $comentarios = CommentCourse::with('usuario')->orderBy('id', 'desc')->where('status', 1)->offset(0)->limit(3)->get();
        return view('cursos.landing-cursos', ['cursos_generales' => $cursos_generales, 'comentarios' => $comentarios, 'cursos' => $cursos]);
    }

    /**
     * Devuelve el listado de los cursos disponibles para el alumno.
     *
     * @return view
     */
    public function indexAlumno(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        return view('cursos.alumnos.index', ['cursos' => $user->curso]);
    }

    /**
     * Devuelve el listado de los cursos disponibles para la administración.
     *
     * @return view
     */
    public function indexAdmin()
    {
        $result = Course::orderBy('id', 'desc')->get();
        return view('cursos.index', ['cursos' => $result]);
    }

    /**
     * Muestra el formulario para crear un curso.
     *
     * @return view
     */
    public function create()
    {
        return view('cursos.crearcurso');
    }

    /**
     * Guarda un curso en la base de datos.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|max:250',
            'init_date' => 'bail|required|date',
            'hora_init_date' => 'required',
            'end_date' => 'bail|required|date',
            'hora_end_date' => 'required'
            //'ingresosTutor' => 'integer',
            //'image' => 'mimes:jpeg,jpg,png,gif,svg|max:5120'
        ]);

        if ($validator->fails()) {
            return redirect('/crearcurso')
                        ->withErrors($validator)
                        ->withInput();
        }

        $format = 'Y-m-d';
        $init_date = new DateTime($request->init_date);
        $init_date = $init_date->format($format);

        $end_date = new DateTime($request->end_date);
        $end_date = $end_date->format($format);

        DB::beginTransaction();
        try {
            //$file_name = NULL;
            //Si envió imagen de portada la guardamos en public, en una carpeta de cursos
            /*if($request->hasFile('image')){
                $file_name = $request->file('image')->getClientOriginalName();
                Storage::putFileAs('cursos/', $request->file('image'), $file_name);
            }*/
            $curso = Course::create([
                'name' => $request->name,
                'init_date' => $init_date,
                'hora_init_date' => $request->hora_init_date,
                'end_date' => $end_date,
                'hora_end_date' => $request->hora_end_date,
                'description' =>  $request->description,
                'cbu' => $request->transCurso
                //'price' => $request->ingresosTutor,
                //'image' => $file_name,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al registrar el curso, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'El curso fue creado satisfactoriamente.');
        return redirect()->action('CursoController@indexAdmin');
    }

    /**
     * Muestra el formulario para editar un curso.
     *
     * @param  $id
     * @return view
     */
    public function edit($id){
        $curso = Course::findOrFail($id);
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'profesor')->orWhere('name', 'mod');
        })->get();
        return view('cursos.editarcurso',['curso' => $curso, 'users' => $users]);
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
            'init_date' => 'bail|required|date',
            'hora_init_date' => 'required',
            'end_date' => 'bail|required|date',
            'hora_end_date' => 'required'
            //'ingresosTutor' => 'integer',
            //'image' => 'mimes:jpeg,jpg,png,gif,svg|max:5120'
        ]);

        if ($validator->fails()) {
            return redirect('/editarcurso/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $format = 'Y-m-d';
        $init_date = new DateTime($request->init_date);
        $init_date = $init_date->format($format);

        $end_date = new DateTime($request->end_date);
        $end_date = $end_date->format($format);

        DB::beginTransaction();
        try {
            $curso = Course::findOrFail($id);
            //$file_name = $curso->image;

            //Si mandó una imagen (reemplazar la anterior)
            /*if($request->hasFile('image')){
                //Borramos la imagen vieja
                Storage::disk('public')->delete('/cursos/' .$file_name);
                //Nueva imagen
                $file_name = $request->file('image')->getClientOriginalName();
                //Guardamos la nueva imagen
                Storage::putFileAs('cursos/', $request->file('image'), $file_name);
            }*/

            $curso->name = $request->name;
            $curso->init_date = $init_date;
            $curso->hora_init_date = $request->hora_init_date;
            $curso->end_date = $end_date;
            $curso->hora_end_date = $request->hora_end_date;
            $curso->description = $request->description;
            $curso->cbu = $request->transCurso;
            //$curso->price = $request->ingresosTutor;
            //$curso->image = $file_name;
            //$curso->user_id = $request->user_id;

            $curso->save();

        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al modificar el curso, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'El curso fue modificado satisfactoriamente.');
        return redirect()->action('CursoController@indexAdmin');
    }
    public function show($id){

    }
    /**
     * Elimina un curso.
     *
     * @param  Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        DB::beginTransaction();
        try {
            $curso = Course::findOrFail($id);
            //Borramos las clases y contenidos asociadoss
            $clases = Lesson::where('course_id', $id)->get();
            foreach ($clases as $clase) {
                $clase->delete();
            }
            $contenidos = Content::where('course_id', $id)->get();
            foreach ($contenidos as $contenido) {
                $contenido->delete();
            }
            $curso->delete();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al eliminar el curso, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'El curso fue eliminado satisfactoriamente.');
        return redirect()->action('CursoController@indexAdmin');
    }

    public function cargarRegistro(Request $request){
        $curso = '';
        foreach ($request->input('cursoMatricula2') as $c) {
            $curs = Course::findOrFail($c);
            $curso .= $curs->name.'#';
        }
        $fecha = date('Y-m-d-H-i-s');

        $validator = Validator::make($request->all(), [
            'nombreAlumno' => 'bail|required|max:100',
            'apellidoAlumno' => 'bail|required|max:100',
            'telAlumno' => 'bail|required|numeric|digits_between:8,14',
            'dniAlumno' => 'bail|required|numeric|digits:8',
            'emailAlumno' => 'bail|required|email',
            'comprobante' => 'bail|required|file|max:10240',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }

        //Creando ruta para el documento
        $ruta = public_path().'/storage/transferencias/';
        \Storage::makeDirectory('/transferencias');
        $ruta_comp = null;
        if($request->has('comprobante')){
            $file = $request->file('comprobante');
            $nombre = "comprobante-".$fecha.".".$request->file('comprobante')->extension();
            \Storage::disk('public')->put('transferencias/'.$nombre,  \File::get($file));
            $ruta_comp = 'storage/transferencias/'.$nombre;
        }
        
        $pedido = new Transferencias();
        $pedido->fill([
            'course_id' => $curso,
            'nombre' => $request->input('nombreAlumno').' '.$request->input('apellidoAlumno'),
            'dni' => $request->input('dniAlumno'),
            'telefono' => $request->input('telAlumno'),
            'email' => $request->input('emailAlumno'),
            'comprobante' => $ruta_comp,
            'estado' => 0
        ]);
        $pedido->save();

        $request->session()->flash('mensaje-success', 'El comprobante fue cargado.');
        return redirect('/landingCursos');
    }

    /**
     * Muestra el listado de alumnos para matricular.
     *
     * @param  $id
     * @return view
     */
    public function showMatriculacion($id){
        $curso = Course::findOrFail($id);

        $alumnos = User::with('roles')->whereHas('roles', function($query){
            $query->where('roles.id', 5);
        })->get();

        foreach ($alumnos as $key => $value) {
            foreach($curso->alumnos as $matriculado){
                if($value->id == $matriculado->id){
                    $alumnos->forget($key);
                }
            }
        }

        return view('cursos.matricular',['curso' => $curso, 'alumnos' => $alumnos, 'matriculados' => $curso->alumnos]);
    }

    /**
     * Agrega un alumno al curso.
     *
     * @param  $idAlumno
     * @param  $idCurso
     * @return view
     */
    public function agregarAlumno($idAlumno, $idCurso){
        $curso = Course::findOrFail(decrypt($idCurso));

        DB::beginTransaction();
        try {
            $curso->alumnos()->attach(decrypt($idAlumno));
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al agregar el alumno del curso, por favor pongase en contacto con el administrador.")->withInput();
        }
        DB::commit();

        $alumnos = User::with('roles')->whereHas('roles', function($query){
            $query->where('roles.id', 5);
        })->get();

        foreach ($alumnos as $key => $value) {
            foreach($curso->alumnos as $matriculado){
                if($value->id == $matriculado->id){
                    $alumnos->forget($key);
                }
            }
        }

        return view('cursos.matricular',['curso' => $curso, 'alumnos' => $alumnos, 'matriculados' => $curso->alumnos]);
    }

    /**
     * Quita un alumno del curso.
     *
     * @param  $idAlumno
     * @param  $idCurso
     * @return view
     */
    public function quitarAlumno($idAlumno, $idCurso){
        $curso = Course::findOrFail(decrypt($idCurso));

        DB::beginTransaction();
        try {
            $curso->alumnos()->detach(decrypt($idAlumno));
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al eliminar el alumno del curso, por favor pongase en contacto con el administrador.")->withInput();
        }
        DB::commit();

        $alumnos = User::with('roles')->whereHas('roles', function($query){
            $query->where('roles.id', 5);
        })->get();

        foreach ($alumnos as $key => $value) {
            foreach($curso->alumnos as $matriculado){
                if($value->id == $matriculado->id){
                    $alumnos->forget($key);
                }
            }
        }

        return view('cursos.matricular',['curso' => $curso, 'alumnos' => $alumnos, 'matriculados' => $curso->alumnos]);
    }

    /**
     * Devuelve el listado de los comentarios.
     *
     * @param $idCurso
     * @return view
     */
    public function indexComentarios($idCurso)
    {
        $curso = Course::findOrFail($idCurso);
        return view('cursos.comentarios.index', ['curso' => $curso]);
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
            $comentario = CommentCourse::findOrFail($idComentario);
            $comentario->status = $comentario->status == 1 ? 0 : 1;
            $comentario->save();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al actualizar el comentario, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $curso = Course::findOrFail($comentario->curso->id);

        return view('cursos.comentarios.index', ['curso' => $curso]);
    }

    /**
     * Guarda un comentario en la base de datos.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'autor' => 'bail|required',
            'course_id' => 'bail|required',
            'valora' => 'bail|required',
            'description' => 'bail|required'
        ]);

        if ($validator->fails()) {
            return redirect('/landingCursos')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = null;
        if(Auth::check()){
            $user = Auth::user()->id;
        }

        DB::beginTransaction();
        try {
            $comentario = CommentCourse::create([
                'author' => $request->autor,
                'course_id' => $request->course_id,
                'comment' => $request->description,
                'status' => 0, //Desactivado
                'score' => $request->valora,
                'user_id' => $user
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors("Se ha producido un error al registrar el comentario, por favor pongase en contacto con el administrador.")->withInput();
        }

        DB::commit();

        $request->session()->flash('mensaje-success', 'El comentario fue agregado exitosamente. Podrá visualizarlo cuando se apruebe desde la administración.');
        return redirect('/landingCursos');
    }
}
