<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureCustomerUser
{
    /**
     * Allow only users whose role_id matches the configured "user" (customer) role.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('home');
        }

        if ($user->hasCustomerRole()) {
            return $next($request);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $message = config('roles.messages.middleware_blocked');

        if ($request->expectsJson()) {
            return response()->json([
                'status' => false,
                'message' => $message,
            ], 403);
        }

        return redirect()->route('home')->with('error', $message);
    }
}
