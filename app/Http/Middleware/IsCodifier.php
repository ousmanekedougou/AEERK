<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class IsCodifier
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
        if (Auth::guard('admin')->user()->is_admin == 1 || Auth::guard('admin')->user()->is_admin == 2 ) {
            return $next($request);
        }else {
            Flashy::error('Vous n\'aviez pas access sur cette page');
            return back();
        }
    }
}
