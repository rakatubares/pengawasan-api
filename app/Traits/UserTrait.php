<?php

namespace App\Traits;

use App\Services\SSO;

trait UserTrait
{
	public function getUserInfo($token)
	{
		$sso = app(SSO::class);
		$sso->setToken($token);
		$userInfo = $sso->getUserInfo();

		return $userInfo;
	}

	public function checkPermission($permission, $userToken) 
	{
		$userInfo = $this->getUserInfo($userToken);
		$userPermissions = $userInfo['apps_data'][config('sso.app_id')]['permissions'];
		$is_permitted = in_array($permission, $userPermissions);
		return $is_permitted;
	}
}