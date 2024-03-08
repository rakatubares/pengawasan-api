<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\Entitas\EntitasOrangResource;
use App\Http\Resources\References\RefBandaraResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokNhiNOrangResource extends JsonResource
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
			'entitas' => new EntitasOrangResource($this->entitas),
			'nomor_sarkut' => $this->nomor_sarkut,
			'pelabuhan_asal' => new RefBandaraResource($this->pelabuhan_asal),
			'pelabuhan_tujuan' => new RefBandaraResource($this->pelabuhan_tujuan),
			'tanggal_berangkat' => $this->tanggal_berangkat != null
				? $this->tanggal_berangkat->format('d-m-Y')
				: null,
			'waktu_berangkat' => $this->waktu_berangkat,
			'tanggal_datang' => $this->tanggal_datang != null
				? $this->tanggal_datang->format('d-m-Y')
				: null,
			'waktu_datang' => $this->waktu_datang,
			'data_lain' => $this->data_lain,
		];

		return $array;
	}
}
