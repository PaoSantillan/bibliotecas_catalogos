<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    protected function authenticated(Request $request, User $user)
    {
        Auth::logoutOtherDevices($request->password);
    }


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Modifica la autenticación por defecto de Laravel (email) por la autenticación por username.
     *
     * @return string
     */
    public function login(request $request){
        $user = User::where('username', $request->input('username'))->get();
        if(count($user) != 1){
            return redirect('login');
        }

        $admin =  true;
        $entra = false;
        $cooki = "";
        $guardar = false;

        if($user[0]->hasAnyRole(['super','admin','mod','profesor'])){
            $entra = true;
            $admin = false;
        }else{
            $navegador = substr($request->input('navegador'), 0, 15);
            $codigo = $this->randoms(20);

            if($request->input('cookie') != null){
                $cookie = $request->input('cookie');
                if($user[0]->cookie1 != null){
                    if(decrypt($cookie) == ($user[0]->cookie1.$navegador)){
                        $entra = true;
                    }
                }
                if($user[0]->cookie2 != null && !$entra){
                    if(decrypt($cookie) == ($user[0]->cookie2.$navegador)){
                        $entra = true;
                    }
                }
                if($user[0]->cookie1 == null && !$entra){
                    $cooki = encrypt($codigo.$navegador);
                    $user[0]->cookie1 = $codigo;
                    $guardar = true;
                    $entra = true;
                }
                if($user[0]->cookie2 == null && !$entra){
                    $cooki = encrypt($codigo.$navegador);
                    $user[0]->cookie2 = $codigo;
                    $guardar = true;
                    $entra = true;
                }
            }else{
                if($user[0]->cookie1 == null && !$entra){
                    $cooki = encrypt($codigo.$navegador);
                    $user[0]->cookie1 = $codigo;
                    $guardar = true;
                    $entra = true;
                }
                if($user[0]->cookie2 == null && !$entra){
                    $cooki = encrypt($codigo.$navegador);
                    $user[0]->cookie2 = $codigo;
                    $guardar = true;
                    $entra = true;
                }
            }
        }

        if(!$entra){
            return redirect('login')->withErrors(['cookie' => 'El usuario ya se encuentra registrado en dos dispositivos diferentes.']);
        }

        $user_data = array(
            'username'  => $request->get('username'),
            'password' => $request->get('password')
        );


        if(!Auth::attempt($user_data)){
            return redirect('login');
        }
        
        if ( Auth::check() ) {
            if($guardar){
                $user[0]->save();
            }
            if($cooki != ""){
                $request->session()->flash('cookie', $cooki);
            }
            if ( Auth::attempt( ['username' => $request->input('username'), 'password' => $request->input('password')]) && $admin) {
                Auth::logoutOtherDevices($request->password);
            }
            
            return redirect('home');
        }
    }


    public function username()
    {
        return 'username';
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
