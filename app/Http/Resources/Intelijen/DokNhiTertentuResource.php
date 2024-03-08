<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\Entitas\EntitasResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokNhiTertentuResource extends JsonResource
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
			'jenis_dok' => $this->jenis_dok,
			'nomor_dok' => $this->nomor_dok,
			'tanggal_dok' => $this->tanggal_dok
				? $this->tanggal_dok->format('d-m-Y')
				: null,
			'nama_sarkut' => $this->nama_sarkut,
			'nomor_sarkut' => $this->nomor_sarkut,
			'nomor_awb' => $this->nomor_awb,
			'tanggal_awb' => $this->tanggal_awb
				? $this->tanggal_awb->format('d-m-Y')
				: null,
			'merek_koli' => $this->merek_koli,
			'entitas' => new EntitasResource($this->entitas, $this->entitas_type),
			'data_lain' => $this->data_lain,
		];

		return $array;
	}
}
