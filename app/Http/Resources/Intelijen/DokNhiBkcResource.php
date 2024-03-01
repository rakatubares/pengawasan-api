<?php

namespace App\Http\Resources\Intelijen;

use Illuminate\Http\Resources\Json\JsonResource;

class DokNhiBkcResource extends JsonResource
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
			'tempat_penimbunan' => $this->tempat_penimbunan,
			'penyalur' => $this->penyalur,
			'tempat_penjualan' => $this->tempat_penjualan,
			'nppbkc' => $this->nppbkc,
			'nama_sarkut' => $this->nama_sarkut,
			'no_flight_trayek' => $this->no_flight_trayek,
			'data_lain' => $this->data_lain,
		];
		
		return $array;
	}
}
