<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class AssignGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,  $guard = null)
    {
        $urlCurrent = URL::current();
        Session::flash('redirect', $urlCurrent);

        if(!Auth::guard($guard)->check()) {
            switch ($guard) {
                case 'admin':
                    $redirect = '/admin/dang-nhap';
                    break;
                case 'customer':
                    $redirect = '/khach-hang/dang-nhap';
                    break;
                case 'host':
                    $redirect = '/chu-nha/dang-nhap';
                    break;
                default:
                    $redirect = '/';
                    break;
            }
            return redirect($redirect);
        }
        Auth::shouldUse($guard);
        return $next($request);
    }
}
