<?php

namespace App\Http\Resources\Intelijen;

use Illuminate\Http\Resources\Json\JsonResource;

class InformasiResource extends JsonResource
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
			'informasi' => $this->informasi,
			'kode_kepercayaan' => $this->kode_kepercayaan,
			'kode_validitas' => $this->kode_validitas,
		];

		return $array;
	}
}
