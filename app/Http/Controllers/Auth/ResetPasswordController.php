<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    

    // @created by me
    // protected function authenticated(Request $request,$user, string ...$role)
    // {
    //     if($user->role=='Admin'){
    //         // $request->session()->regenerateToken();
    //         return redirect()->route('manager_index');

    //     } elseif( $user->role=='Staff'){
    //         return redirect()->route('staff_index');
    //     } else{
    //             return redirect()->route('index');
    // }

    // }

    // @end created by me
}
