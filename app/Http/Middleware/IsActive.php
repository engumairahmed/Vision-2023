<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && !$user->is_active && !$user->is_doctor) {
            return redirect()->route('activation.request');
        } elseif($user && !$user->is_active && $user->is_doctor){
            return redirect()->route('verification.doctor');
        }

        return $next($request);
    }
}
