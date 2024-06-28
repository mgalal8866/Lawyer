<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and if they are an admin
        if (Auth::check() && Auth::user()->is_admin ==1) {
            // Redirect to the admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // If not admin, proceed with the request
        return $next($request);
    }
}
