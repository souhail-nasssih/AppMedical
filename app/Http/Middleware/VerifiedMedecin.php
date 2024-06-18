<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifiedMedecin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    $user = Auth::user();

    // Vérifie si l'utilisateur est authentifié, a le rôle 'medecin' et si le médecin est non vérifié (s'il existe)
    if ($user && $user->role == 'medecin' && (!$user->medecin || $user->medecin->verification == false)) {
        return redirect()->route('medecinAttend');  
    }
    return $next($request);
}

}
