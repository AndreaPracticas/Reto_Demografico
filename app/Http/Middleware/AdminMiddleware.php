<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
            if (!Auth::check()) {
            return redirect()->route('login', ['expired' => 1]);
        }

        $user = \App\Models\User::withTrashed()->find(Auth::id());

        if (!$user || $user->deleted_at) {
            Auth::logout();
            return redirect()->route('login');
        }

        if (!$user->is_admin) {
            abort(403, 'Acceso denegado');
        }

        if ($user->is_suspended) {
            Auth::logout();
            return redirect()->route('login')->with('status', 'suspended');
        }

        return $next($request);
    }
}
