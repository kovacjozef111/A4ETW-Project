<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateAdmin
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
        $user = Auth::user();
        if (is_null($user)) {
            return redirect('/forum');
        }
        if ($user->isAdmin()) {
            return $next($request);
        }

        return redirect('/forum');
    }
}
