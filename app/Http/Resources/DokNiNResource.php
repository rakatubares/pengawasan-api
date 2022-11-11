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
	public function __construct($resource, $type=null)
	{
		$this->resource = $resource;
		$this->type = $type;
		$this->ni_type = 'nin';
		$this->lkai_type = 'lkain';
	}
}