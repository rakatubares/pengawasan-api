<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TembusanResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$array = $this->uraian;

		return $array;
	}
}
