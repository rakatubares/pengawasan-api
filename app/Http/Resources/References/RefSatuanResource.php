<?php

namespace App\Http\Resources\References;

use Illuminate\Http\Resources\Json\JsonResource;

class RefSatuanResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$array = [
			'id' => $this->id,
			'satuan' => $this->satuan,
		];

		return $array;
	}
}
