<?php

namespace App\Http\Middleware;

use App\Services\SSO;
use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		$sso = app(SSO::class);
		$userInfo = $sso->getUserInfo();

		return $userInfo;
        // return $next($request);
    }
}
