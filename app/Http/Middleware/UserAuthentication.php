<?php

namespace App\Http\Middleware;

use App\Models\RefUserCache;
use App\Services\SSO;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthentication
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
		// Get user token from request
		$token = $request->bearerToken();
		
		if ($token) {
			// Set token into SSO
			$sso = app(SSO::class);
			$sso->setToken($token);

			// Check if token is valid
			$userInfo = $sso->getUserInfo();
			if (gettype($userInfo) == 'array') {
				// Set user as authenticated user
				$user = RefUserCache::where('user_id', $userInfo['user_id'])->first();
				Auth::login($user);

				return $next($request);
			} else {
				return response()->json(['error' => 'Unauthenticated.'], 401);
			}
			
		}
    }
}
