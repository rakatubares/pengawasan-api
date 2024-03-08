<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\References\RefBandaraResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokNhiNSarkutResource extends JsonResource
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
			'nama_sarkut' => $this->nama_sarkut,
			'jenis_sarkut' => $this->jenis_sarkut,
			'nomor_sarkut' => $this->nomor_sarkut,
			'pelabuhan_asal' => new RefBandaraResource($this->pelabuhan_asal),
			'pelabuhan_tujuan' => new RefBandaraResource($this->pelabuhan_tujuan),
			'imo_mmsi' => $this->imo_mmsi,
			'data_lain' => $this->data_lain,
		];

		return $array;
	}
}
