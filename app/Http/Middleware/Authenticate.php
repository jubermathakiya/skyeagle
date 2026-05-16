<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        $request->session()->put('auth_redirect', $request->fullUrl());
        $request->session()->flash('open_login_modal', true);

        return route('home');
    }
}
