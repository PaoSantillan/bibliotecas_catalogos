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
    protected $redirectTo = '/';

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
            return back()->withErrors("Por favor verificar los datos ingresados.")->withInput();
        }

        $user_data = array(
            'username'  => $request->get('username'),
            'password' => $request->get('password')
        );

        if(!Auth::attempt($user_data)){
            return back()->withErrors("Por favor verifica los datos ingresados.")->withInput();
        }
        
        if ( Auth::check() ) {

            if ( Auth::attempt( ['username' => $request->input('username'), 'password' => $request->input('password')])) {
                Auth::logoutOtherDevices($request->password);
            }
            
            return redirect('/');
        }
    }


    public function username()
    {
        return 'username';
    }

}
