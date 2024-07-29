<?php

namespace App\Traits;

use App\Services\SSO;

trait UserTrait
{
    public function getUserInfo($token)
    {
        $sso = app(SSO::class);
        $sso->setToken($token);
        return $sso->getUserInfo();
    }

    public function checkPermission($permission, $userToken)
    {
        $userInfo = $this->getUserInfo($userToken);
        $userPermissions = $userInfo['apps_data'][config('sso.app_id')]['permissions'];
        return in_array($permission, $userPermissions);
    }
}
