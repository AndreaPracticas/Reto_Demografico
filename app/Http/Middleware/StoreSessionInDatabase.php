<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StoreSessionInDatabase
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Guardar sesión actual en la base de datos manualmente
        if (Session::has('user_id')) {
            $sessionId = Session::getId();
            $payload = serialize(Session::all());

            DB::table('sessions')->updateOrInsert(
                ['id' => $sessionId],
                [
                    'user_id' => Session::get('user_id'),
                    'ip_address' => $request->ip(),
                    'user_agent' => substr($request->userAgent(), 0, 500),
                    'payload' => $payload,
                    'last_activity' => now()->timestamp,
                ]
            );
        }

        return $response;
    }
}
