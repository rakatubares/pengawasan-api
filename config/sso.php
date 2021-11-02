<?php

return [
	/*
	 | --------------------------------------------------------------------------
	 | SSO Server
	 | --------------------------------------------------------------------------
	 | 
	 | This is the address of SSO provider.
	 | 
	 */

	'server' => env('SSO_SERVER', 'http://ssoserver.local/'),

	/*
	 | --------------------------------------------------------------------------
	 | SSO App ID
	 | --------------------------------------------------------------------------
	 | 
	 | This value is the ID provided by SSO Server for this application.
	 | Set this in your ".env" file.
	 | 
	 */

	'app_id' => env('SSO_APP_ID'),

	/*
	 | --------------------------------------------------------------------------
	 | SSO App Secret Key
	 | --------------------------------------------------------------------------
	 | 
	 | This value is the secret key provided by SSO Server for this application.
	 | Set this in your ".env" file.
	 | 
	 */

	'app_secret' => env('SSO_APP_SECRET')
];