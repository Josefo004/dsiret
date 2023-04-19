<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    { 
        
        if (Auth::guest()) {
            return redirect('/login');
        }
        if(Auth::user()->estado=='D'){//Si la cuenta esta desactivada, aborta solicitud
            abort(403);
        }
        if (! $request->user()->can($permission)) {//si usuario no cuenta con los permisos necesarios, aborta solicitud
            abort(403);
        }
        return $next($request);
    }
}
