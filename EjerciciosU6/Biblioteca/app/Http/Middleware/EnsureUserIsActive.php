<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsActive
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Auth::user()->is_active) {
            Auth::logout();

            return redirect('/login')
                ->withErrors([
                    'email' => 'Tu cuenta ha sido desactivada. Contacta con un administrador.'
                ]);
        }

        return $next($request);
    }
}
