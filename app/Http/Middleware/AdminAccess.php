<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminAccess
{
    public function handle($request, Closure $next)
    {
        if (Session::has('user') && Session::get('user.userRole') == 'Admin') {
            return $next($request);
        }

        return redirect(route('frontend.index'));
    }
}
