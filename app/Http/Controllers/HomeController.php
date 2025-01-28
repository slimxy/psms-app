<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('staff.auth');
        // $this->middleware('manager.auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');

        
    //     if($user->role=='Admin'){
    //         // $request->session()->regenerateToken();
    //         return redirect()->route('manager_index');

    //     } elseif( $user->role=='Staff'){
    //         return redirect()->route('staff_index');
    //     } else{
    //             return redirect()->route('index');
    // }
    }
}
