<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\DokTableResource;

class DokNiNTableResource extends DokTableResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$array = $this->makeBasicArray();
		$array['no_lkain'] = $this->chain->lkain
			? $this->chain->lkain->no_dok_lengkap
			: '-';
		$array['tgl_lkain'] = $this->chain->lkain
			? $this->chain->lkain->tanggal_dokumen->format('d-m-Y')
			: '';

		return $array;
	}
}
