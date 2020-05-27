<?php

namespace App\Http\Middleware;

use Closure;

class TaxiDriver
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
        if ($user->type_users_id=='3') {
            return $next($request);
        }
        return redirect('home');
    }
}
