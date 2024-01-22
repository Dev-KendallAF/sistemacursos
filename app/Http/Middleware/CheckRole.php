<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role = '1')
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('/login');
        }
        
        // Verificar el rol del usuario
        if (Auth::user()->role_id != $role) {
            // Puedes personalizar el comportamiento para usuarios no autorizados
            abort(403, 'Acceso no autorizado');
        }

        return $next($request);
    }

}
