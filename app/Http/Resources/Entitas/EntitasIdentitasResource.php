<?php

namespace App\Http\Resources\Entitas;

use Illuminate\Http\Resources\Json\JsonResource;

class EntitasIdentitasResource extends JsonResource
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
			'jenis' => $this->jenis,
			'nomor' => $this->nomor,
			'pejabat_penerbit' => $this->pejabat_penerbit,
			'tempat_penerbitan' => $this->tempat_penerbitan,
		];

		return $array;
	}
}
