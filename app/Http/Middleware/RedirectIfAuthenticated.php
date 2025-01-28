<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
// use App\Models\{Staff, Manager, User};


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response

    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                auth()->logout();
                $request ->session()->flush();
                return redirect(RouteServiceProvider::LOGIN);
            }
           
        }
        return $next($request);
    }








    // @created by me

    // public function handle(Request $request,Closure $next, ...$guard): Response
    // {
    //     // $user= Auth()->user()->role;
    //     $user = $request->user();


    //     if ($guard == "user" && Auth::guard($guard)->check() && $user ==='Admin') {
    //         error_log(user()->role);
    //         return redirect()->route('manager_index');
    //     }
    //     if ($guard == "user" && Auth::guard($guard)->check() &&        $user ==='Staff' ) {
    //         error_log(user()->role);
    //         return redirect()->route('staff_index');
    //     }
        
    //     error_log("not auth");
    //     return $next($request);

    // }


    // @end created by me



}