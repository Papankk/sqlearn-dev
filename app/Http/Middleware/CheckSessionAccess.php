<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckSessionAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $sesi = session("slug_map.$request->slug"); // Ensure your route model binding works

        if ($user && $sesi && $user->current_session < $sesi) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'session_locked'], 403);
            }
            return redirect()->back()->with('session_locked', true);
        }

        return $next($request);
    }
}
