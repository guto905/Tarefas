<?php

namespace App\Http\Middleware;

use Closure;

class AuthTarefas
{
    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            return response()->json(['message' => 'Não autorizado'], 401);
        }

        return $next($request);
    }
}

