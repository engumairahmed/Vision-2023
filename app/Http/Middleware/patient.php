<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Patient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          
        if (auth()->check() && !auth()->user()->is_admin) {
            // dd(auth()->user()->is_admin);
            if(auth()->check() && !auth()->user()->is_doctor){
                return $next($request);
            } else{
                return redirect()->route('doctor.home');
            }            
        }
        return redirect()->route('admin.dashboard');

        // return redirect()->route('user-index');
    }
}
