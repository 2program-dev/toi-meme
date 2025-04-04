<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApprovedUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $approved = $user->approved ?? false;
        if(!$approved){
            return redirect()->route('order-list')->with('error', 'Devi essere approvato per poter acquistare i prodotti.');
        }

        return $next($request);
    }
}
