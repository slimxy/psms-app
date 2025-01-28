<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\{Staff, Manager, User};


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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = './index';   // initial
    

    // @Me
    protected function authenticated(Request $request,$user, string ...$role)
    {

        if( $user->role ==='Manager'){
            $request->session()->regenerateToken(); 
            return redirect()->route('manager_index');

        }
        if($user->role ==='Admin'){
            $request->session()->regenerateToken(); 
            return redirect()->route('admin_index');
        }elseif( $user->role==='Staff' ){
                $request->session()->regenerateToken();
                return redirect()->route('staff_index');
        } else{
                redirect()->route('index');
    }

    }
    // @endMe

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
