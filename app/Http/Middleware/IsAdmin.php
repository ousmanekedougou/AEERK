<?php

namespace App\Http\Middleware;

use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class IsAdmin
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
        if (Auth::guard('admin')->user()->is_admin == 1 ) {
            return $next($request);
        }else {
            Toastr::error('Vous n\'aviez pas acces a cette page', 'Error Page', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
