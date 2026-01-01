<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ($user and !$user?->is_admin) {
            return $next($request);
        }

        if ($user and $user?->is_admin) {
            return redirect(route('admin.home'));
        }

        return redirect(route('user.login'));
    }
}
