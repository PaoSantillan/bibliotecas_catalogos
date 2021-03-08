<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Role;
use App\User;
use App\Course;
use App\CourseGeneral;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = User::with('roles')->with('course')->whereHas('roles', function ($query) {
                                $query->where('name', 'profesor')->orWhere('name', 'mod');
                            })->get();
        //$cursos = Course::where('user_id', null)->get();
        $cursos = CourseGeneral::where('user_id', null)->get();

        return view('adminusuarios', [ 
            'user'=> $user, 
            'cursos' => $cursos, 
            'pass' => $this->randoms(8)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $user = User::with('roles')->with('course')->whereHas('roles', function ($query) {
                                $query->where('name', 'profesor')->orWhere('name', 'mod');
                            })->get();
        $cursos = Course::where('user_id', null)->get();

        return view('adminusuarios', [
            'user'=> $user, 
            'cursos' => $cursos, 
            'pass' => $this->randoms(8)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'usuario' => 'bail|required|min:3|max:100|unique:users,username', 
            'nombre' => 'bail|required|min:3|max:100',
            'email' => 'bail|required|email|min:5|max:100|unique:users,email',
            'contrasenia' => 'bail|required|min:5',
        ]);


        $user = new User();
        $user->fill([
            'name' => $request->input('nombre'),
            'username' => $request->input('usuario'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('contrasenia')),
        ]);
        $user->save();
        $user->roles()->attach(Role::where('name', 'profesor')->first());

        $request->session()->flash('mensaje-success', 'El profesor fue cargado.');
        return redirect('profesores');
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
        $profesor = User::with('roles')->with('course')->findOrFail(decrypt($id));

        return view('editadminusuarios',['prof' => $profesor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $profesor = User::with('roles')->findOrFail($id);

        $this->validate($request, [ 
            'nombre' => 'bail|min:3|required',
            'contrasenia' => 'bail|nullable|min:5',
            'usuario' => 'bail|required|min:3|unique:users,username,'.$profesor->username.',username',
            'email' => 'bail|required|email|min:5|unique:users,email,'.$profesor->email.',email',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:5120'
        ]);

        $ruta = null;
        if($request->has('image')){
            if($profesor->photo != null){
                Storage::disk('public')->delete(substr($profesor->photo,7));
            }
            $file = $request->file('image');
            $nombre = $profesor->dni."-photo.".$request->file('image')->extension();
            \Storage::disk('public')->put('profesores/'.$nombre,  \File::get($file));
            $ruta = 'storage/profesores/'.$nombre;
        }
        if($ruta!=null){
            $profesor->photo = $ruta;
        }

        $profesor->name = $request->input('nombre');
        $profesor->username = $request->input('usuario');
        $profesor->email = $request->input('email');

        if($request->input('contrasenia') != ""){
            $profesor->password = Hash::make($request->input('contrasenia'));
        }
        $profesor->save();
        
        $request->session()->flash('mensaje-success', 'El profesor fue modificado.');
        return redirect('profesores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        $profesor = User::findOrFail(decrypt($id));
        $profesor->delete();

        $request->session()->flash('mensaje-success', 'El profesor fue eliminado.');
        return redirect('profesores');
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
