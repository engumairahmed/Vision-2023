<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Doctor
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
            if(auth()->check() && auth()->user()->is_doctor){
                return $next($request);
            } else{
                return redirect()->route('patient.home');
            }            
        }
        return redirect()->route('admin.dashboard');

        // return redirect()->route('user-index');
    
    }
}
