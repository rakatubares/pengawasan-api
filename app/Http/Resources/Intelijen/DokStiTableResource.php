<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\DokTableResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokStiTableResource extends DokTableResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		return $this->makeBasicArray();
	}
}
