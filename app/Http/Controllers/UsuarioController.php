<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function usuario($name){
        $user = User::where('username', $name)->get();

        if(count($user) == 1){
            return $user[0]->id;
        }else{
            return null;
        }
    }

    public function resetCookie(Request $request, $id){
        $user = User::findOrFail(decrypt($id));
        $user->cookie1 = null;
        $user->cookie2 = null;
        $user->last_cookie_reset = date('Y-m-d H:i:s');
        $user->save();

        $request->session()->flash('mensaje-success', 'Cookie del usuario '.$user->username.' reseteada');
        return redirect('profesores');
    }
    public function resetCookie1(Request $request, $id){
        $user = User::findOrFail(decrypt($id));
        $user->cookie1 = null;
        $user->cookie2 = null;
        $user->last_cookie_reset = date('Y-m-d H:i:s');
        $user->save();

        $request->session()->flash('mensaje-success', 'Cookie del usuario '.$user->username.' reseteada');
        return redirect('alumnos');
    }
}

