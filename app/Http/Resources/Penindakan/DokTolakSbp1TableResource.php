<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\Penindakan\DokPenindakanTableResource;

class DokTolakSbp1TableResource extends DokPenindakanTableResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$this->chain = $this->tolakable->chain;

		$array = parent::toArray($request);
		$array['nomor_sbp'] = $this->tolakable->no_dok_lengkap;
		$array['tanggal_sbp'] = $this->tolakable->tanggal_dokumen
			? $this->tolakable->tanggal_dokumen->format('d-m-Y')
			: '-';

		return $array;
	}
}
