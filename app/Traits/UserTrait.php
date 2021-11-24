<?php

namespace App\Traits;

use App\Services\SSO;

trait UserTrait
{
	public function getUserInfo()
	{
		$sso = app(SSO::class);
		$userInfo = $sso->getUserInfo();

		return $userInfo;
	}
}