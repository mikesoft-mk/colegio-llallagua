<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class InicioDirector // 🎯 Nombre exacto de tu clase
{
    public function handle(Request $request, Closure $next): Response
{

    if (!auth()->check()) {
        return redirect()->route('login');
    }

    
    $roleId = auth()->user()->id_rol; // 

    
    if ($roleId != 1) {
        return redirect()->route('profesor.panel')->with('error', 'Acceso denegado. No eres Director.');
    }

    return $next($request);
}
}
