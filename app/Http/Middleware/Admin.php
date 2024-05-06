<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->user_type !== 'App\Models\Admin') {
            // Si l'utilisateur n'est pas un administrateur, vous pouvez rediriger ou renvoyer une réponse d'erreur
            return redirect()->route('login')->with('error', 'Vous n\'avez pas les autorisations nécessaires.');
        }
        return $next($request);
    }
}
