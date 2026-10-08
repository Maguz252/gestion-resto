<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {



        if ($request->user()->isAdmin() && $request->user()) {
            # code...
            return $next($request);
        }

        abort(403, 'Acceso denegado');
    }
}
