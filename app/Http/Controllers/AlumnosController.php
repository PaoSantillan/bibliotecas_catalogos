<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Course;
use App\User;
use App\Role;

use Illuminate\Support\Facades\Hash;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $alumnos = User::with('roles')->whereHas('roles', function($query){
            $query->where('roles.id', 5);
        })->get();

        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $cursos = Course::get();

        return view('crearestudiante', ['cursos' => $cursos, 'pass' => $this->randoms(8)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombreAlumno' => 'bail|required|max:100',
            'telefono' => 'bail|required|numeric|digits_between:8,14',
            'dniAlumno' => 'bail|required|numeric|digits:8',
            'emailAlumno' => 'bail|required|email|unique:users,email',
            'userAlumno' => 'bail|required|string|unique:users,username|max:100',
            'passAlumno' => 'bail|required|string|max:100',
            'fecha' => 'bail|required|date'
        ]);
        if ($validator->fails()) {
            return redirect('/alumnos/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $alumno = new User();
        $alumno->fill([
            'name' => $request->input('nombreAlumno').' '.$request->input('apellidoAlumno'),
            'email' => $request->input('emailAlumno'),
            'created_at' => $request->input('fecha'),
            'username' => $request->input('userAlumno'),
            'password' => Hash::make($request->input('passAlumno')),
            'phone' => $request->input('telefono'),
            'dni' => $request->input('dniAlumno')
        ]);
        $alumno->save();
        foreach ($request->input('cursoMatricula') as $m) {
            $alumno->curso()->attach(Course::find($m));
        }
        
        $alumno->roles()->attach(Role::where('name', 'alumno')->first());
        
        $request->session()->flash('mensaje-success', 'El estudiante fue creado satisfactoriamente.');
        return redirect()->action('AlumnosController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $alumno = User::findOrFail(decrypt($id));

        return view('alumnos.edit',['alumno' => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $alumno = User::findOrFail(decrypt($id));

        $validator = Validator::make($request->all(), [
            'nombreAlumno' => 'bail|required|max:100',
            'telefono' => 'bail|required|numeric|digits_between:8,14',
            'dniAlumno' => 'bail|required|numeric|digits:8',
            'emailAlumno' => 'bail|required|email|unique:users,email,'.$alumno->email.',email',
            'userAlumno' => 'bail|required|string|max:100|unique:users,username,'.$alumno->username.',username',
            'passCurso' => 'bail|nullable|string|min:5|max:100',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:5120'
        ]);
        if ($validator->fails()) {
            return redirect('/alumnos/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $ruta = null;
        if($request->has('image')){
            if($alumno->photo != null){
                Storage::disk('public')->delete(substr($alumno->photo,7));
            }
            $file = $request->file('image');
            $nombre = $alumno->dni."-photo.".$request->file('image')->extension();
            \Storage::disk('public')->put('alumnos/'.$nombre,  \File::get($file));
            $ruta = 'storage/alumnos/'.$nombre;
        }
        if($ruta!=null){
            $alumno->photo = $ruta;
        }

        $alumno->name = $request->input('nombreAlumno');
        $alumno->email = $request->input('emailAlumno');
        $alumno->username = $request->input('userAlumno');
        $alumno->phone = $request->input('telefono');
        $alumno->dni = $request->input('dniAlumno');

        if($request->input('passCurso') != null){
            $alumno->password = Hash::make($request->input('passCurso'));
        }
        
        $alumno->save();

         
        $request->session()->flash('mensaje-success', 'El estudiante fue modificado.');
        return redirect('alumnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        $alumno = User::findOrFail(decrypt($id));
        $alumno->delete();

        $request->session()->flash('mensaje-success', 'El alumno fue eliminado.');
        return redirect('alumnos');
    }

    public function randoms($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
