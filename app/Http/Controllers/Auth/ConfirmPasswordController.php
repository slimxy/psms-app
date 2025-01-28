<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = '/home';     //initial
    // protected $redirectTo = '/manager/index';

    // @created by me
    // protected function authenticated(Request $request,$user, string ...$role)
    // {
    //     $use=$request->input('role');
    //     if($use->role=='Admin'){
    //         $request->session()->regenerateToken();
    //         return redirect()->route('manager_index');

    //     } elseif( $use->role=='Staff'){
    //         $request->session()->regenerateToken();
    //         return redirect()->route('staff_index');
    //     } else{
    //             return redirect()->route('index');
    // }

    // }
    // @user byuser me

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
