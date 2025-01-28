<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   
    protected $redirectTo = RouteServiceProvider::LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin,Manager')->only('showRegistrationForm','register');
    }




    // @Me
    //

    public function showRegisterForm(){
        if(auth()->user()->role =='Manager' || auth()->user()->role =='Admin' ){
            return view('auth.register');
        }
        abort(403, 'Unathorised action.');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
       $user= $this->create($request->all());
       $user->save();

if(auth()->user()->role === 'Admin')
        {
         $user->admin_id = auth()->id();  // to link manager to the registered admin
         $user->save();

         return redirect('admin/index')->with('success',"Admin registered successfully");


}elseif(auth()->user()->role === 'Manager'){
    $user->manager_id = auth()->id();  // to link manager to the registered admin
    $user->save();
    return redirect('manager/index')->with('success',"manager registered successfully");

}

// $user->save();    //    return $this->redirectAfterRegistration($user);

    }
    // protected function redirectAfterRegistration($user){
    //    switch($user->role){
    //     case "Admin":
    //         return redirect('admin/index')->with('success',"Admin registered successfully");
    //     case "Manager":
    //         return redirect('manager/index')->with('success',"Manager registered successfully");
    //     case "Staff":
    //         return redirect('staffs/index')->with('success',"Staff registered successfully");
    //     default:
    //         return redirect('login')->with('error','Unable to authorise action');
    //    }

        // if ($user->role === 'Admin')
        // {        //     return redirect('admin/index')->with('success',"Manager registered successfully");
        // }        // if ($user->role === 'Manager')
        // {        //     return redirect('manager/index')->with('success',"staff registered successfully");
        // }
       
       
      
    // }
    // @endMe



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'in:Admin,Manager,Staff'],
            'state' => ['required', 'string', 'required'],
            'station' => ['required', 'string', 'required'],
            'uname' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $currentUserId = Auth::id();
        $currentUserRole = Auth::user()->role;
        return User::create([
            'name' => $data['name'],
            'uname' => $data['uname'],
            'role' => $data['role'],
            'state' => $data['state'],
            'station' => $data['station'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
                        //    'manager_id' =>Auth::id()->user()->role === 'Manager' ? auth()->id() : null,
                        //    'admin_id' =>Auth::id()->user()->role === 'Admin' ? auth()->id() : null,
           'manager_id' => $currentUserRole === 'Manager' ? $currentUserId : null,
           'admin_id' => $currentUserRole === 'Admin' ? $currentUserId : null,

        ]);

        // if (auth()->user()->role === 'Admin' && $data['role'] === 'Manager')
        // {
        //     $user->admin_id = auth()->id;  // to link manager to the registered admin
        // }
        // if (auth()->user()->role === 'Manager'&& $data['role'] === 'Staff')
        // {
        //     $user->manager_id = auth()->id;  // to link staff to the registered Manager
        // }
        // return $user;
     
    }

   
}
