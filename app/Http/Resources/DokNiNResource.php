<?php

namespace App\Http\Resources;

class DokNiNResource extends DokNiResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $request_type='')
	{
		parent::__construct($resource, $request_type);
		$this->ni_type = 'nin';
		$this->lkai_type = 'lkain';
	}
}