<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutenticadorColaboradorAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->is('login') && (!Auth::check() || Auth::user()->perfil_id != 1 || Auth::user()->perfil_id != 2)) {
            return redirect()->route('home.index');
        }
        return $next($request);
    }
}
