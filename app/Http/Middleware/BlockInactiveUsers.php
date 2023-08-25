<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockInactiveUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->status == 0) {
            auth()->logout(); // Cierra la sesión del usuario inactivo
            return redirect('/login')->with('status', 'Tu cuenta está desactivada, pongase en contacto con RH para dudas y aclaraciones.');
        }

        return $next($request);
    }
}
