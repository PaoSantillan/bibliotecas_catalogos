<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CookieLoginController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = '/users/details';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    
    public function showLoginFormUsers(){
        return view('users.login');
    }
    
    public function username(){
        return 'gf_email';
    }
    
    function checklogin(Request $request){
        
        $this->validate($request, [
            'input-email' => 'required', 
            'input-password' => 'required',
        ]);
        
        $user_data = array(
            'gf_email'  => $request->get('input-email'),
            'password' => $request->get('input-password')
        );
        
        if(!Auth::attempt($user_data)){
            return redirect('users');
        }
        
        if ( Auth::check() ) {
            return redirect('users/details');
        }
    }
    
    function logout(){
        Auth::logout();
        return redirect('users');
    }

}