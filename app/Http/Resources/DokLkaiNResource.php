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
	public function __construct($resource, $type=null)
	{
		$this->resource = $resource;
		$this->type = $type;
		$this->lppi_type = 'lppin';
	}
}