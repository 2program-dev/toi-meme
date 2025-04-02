<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // se sono un amministratore passo la verifica
        if(!in_array($user->role, ['admin'])) {

            // altrimenti controllo se il ruolo dell'utente corrente corrisponde ad uno dei ruoli richiesti
            if (!$user || !in_array($user->role, $roles)) {
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
