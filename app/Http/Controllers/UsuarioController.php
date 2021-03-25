<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){
        $result = User::orderBy('id', 'desc')->get();
        return view('usuarios.index', ['usuarios' => $result]);
    }

    public function create(){
        $result = Role::where('name', '!=', 'super')->orderBy('id', 'desc')->get();
        return view('usuarios.create', ['roles' => $result]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'username' => 'bail|required|min:3|max:100|regex:/^[\pL\-]+$/u|unique:users,username', 
            'nombre' => 'bail|required|min:3|max:250',
            'email' => 'bail|required|email|min:5|max:100|unique:users,email',
            'password' => 'bail|required|min:6|max:20',
            'telefono' => 'bail|min:3|max:250',
            'rol' => 'bail|required'
        ]);

        $user = new User();
        $user->fill([
            'username' => $request->input('username'),
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'telefono' => $request->input('telefono'),
        ]);
        $user->save();
        $user->roles()->attach(Role::where('id', $request->rol)->first());

        $request->session()->flash('mensaje-success', 'El usuario fue creado exitosamente.');
        return redirect('usuarios');
    }

    public function edit($id){
        $roles = Role::where('name', '!=', 'super')->orderBy('id', 'desc')->get();
        $user = User::findOrFail($id);

        return view('usuarios.update',['usuario' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        $this->validate($request, [ 
            'username' => 'bail|required|min:3|max:100|regex:/^[\pL\-]+$/u|unique:users,username,'.$user->username.',username',
            'nombre' => 'bail|min:3|max:250|required',
            'email' => 'bail|required|email|min:5|unique:users,email,'.$user->email.',email',
            'password' => 'bail|nullable|min:6|max:20',
            'telefono' => 'bail|min:3|max:250',
            'rol' => 'bail|required'
        ]);

        $user->username = $request->input('username');
        $user->nombre = $request->input('nombre');
        $user->email = $request->input('email');
        $user->telefono = $request->input('telefono');

        if($request->input('password') != ""){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        $rol = Role::where('id', $request->rol)->first();
        if(!$user->hasRole($rol->name)){
            $user->roles()->attach(Role::where('id', $request->rol)->first());
        }
        
        $request->session()->flash('mensaje-success', 'El usuario fue modificado exitosamente.');
        return redirect('usuarios');
    }

    public function destroy(Request $request, $id){
        $user = User::findOrFail($id);
        $user->delete();

        $request->session()->flash('mensaje-success', 'El usuario fue eliminado exitosamente.');
        return redirect('usuarios');
    }
}
