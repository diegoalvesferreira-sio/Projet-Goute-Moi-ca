<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Si connecté comme admin → redirige vers son dashboard
        if (Auth::guard('admin')->check()) {
            return redirect('/admin/dashboard/' . Auth::guard('admin')->user()->id);
        }

        // Si connecté comme critique → redirige vers son dashboard
        if (Auth::guard('web')->check()) {
            return redirect('/critique/dashboard/' . Auth::guard('web')->user()->id);
        }

        return $next($request);
    }
}