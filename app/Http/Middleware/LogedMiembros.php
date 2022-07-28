<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogedMiembros
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session('usuario')) {
            return redirect('login')->with('error','Hace falta validarse con usuario y contraseña para entrar en el Area de miembros');
        }
        return $next($request);
    }
}
