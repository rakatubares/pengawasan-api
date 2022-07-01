<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RefBandaraResource extends JsonResource
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
			'negara' => new RefNegaraResource($this->negara),
			'iata_code' => $this->iata_code,
			'airport_name' => $this->airport_name,
			'municipality' => $this->municipality,
		];

		return $array;
	}
}
