<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{

// public function handle(Request $request, Closure $next, string $role)
// {
//         if( !auth()->check()){
//                 return redirect('login');
//         }
//         $user = auth()->user();

//         if($user->role ==='Manager' || $user->role ==='Admin' || $user->role === $role ){
//         return $next($request);
        //         }         return redirect('login');// }

// public function handle( $request, Closure $next, $role){
// if (!Auth::check()){
//         return redirect('login')->with('error','Unauthorised access.');
//         }
//         $user = Auth::user();

//         if (in_array($user->role === $role)){
//                 return $next($request);
// }//         return redirect('login')->with('error','Unauthorised access.');

// }



public function handle( $request, Closure $next, ...$roles){

if (!Auth::check()){
        Auth::logout();
        return redirect('login')->with('error','Unauthorised access.');

        }

        $user = Auth::user();

        if (in_array($user->role,$roles)){
                return $next($request);
}
        return redirect('login')->with('error','Unauthorised access.');

}



}
