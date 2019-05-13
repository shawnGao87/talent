<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class RequireLogin
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
        require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
        // require_login();
        if (empty($USER) || $USER->id == '') {
            return redirect('../login');
        } else {
            return $next($request);
        }
    }
}
