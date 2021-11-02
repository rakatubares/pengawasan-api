<?php
namespace App\Services;

use Config;
use Illuminate\Http\Request;
use Jasny\SSO\Broker;

class SSO {
	public $sso = null;

	public function __construct(Request $request)
	{
		$sso_url = config('sso.server');
		$app_id = config('sso.app_id');
		$app_secret = config('sso.app_secret');

		$this->sso = new Broker($sso_url, $app_id, $app_secret);
		$this->sso->attach('http://pengawasan.local/api/test');
	}

	public function getUserInfo()
	{
		$userInfo = $this->sso->getUserInfo();

		var_dump($userInfo);

		if ($userInfo == NULL) {
			echo 'User info is null';
			return redirect('http://ssologin.local/login?appid=3');
		} else {
			echo 'User info is NOT null';
		}
	}
}