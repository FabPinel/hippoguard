<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    public function handle($request, Closure $next, ...$guards)
    {
        // Récupérez le rôle d'une manière appropriée, par exemple à partir du paramètre de l'URL, de la session, etc.
        $role = $request->route('role');

        if ($request->user() && $request->user()->role == $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized.');
    }
}
