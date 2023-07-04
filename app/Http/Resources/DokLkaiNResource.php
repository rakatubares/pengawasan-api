<?php

namespace App\Http\Resources;

class DokLkaiNResource extends DokLkaiResource
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
		$this->lppi_type = 'lppin';
	}
}