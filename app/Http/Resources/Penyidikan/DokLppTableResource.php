<?php

namespace App\Http\Resources\Penyidikan;

use App\Http\Resources\DokTableResource;

class DokLppTableResource extends DokTableResource
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

		$sbp = $this->chain->sbp ? $this->chain->sbp : $this->chain->sbpn;
		$array['nomor_sbp'] = $sbp->no_dok_lengkap;
		$array['tanggal_sbp'] = $sbp->tanggal_dokumen
			? $sbp->tanggal_dokumen->format('d-m-Y')
			: null;

		$lp = $this->chain->lp ? $this->chain->lp : $this->chain->lpn;
		$array['nomor_lp'] = $lp->no_dok_lengkap;
		$array['tanggal_lp'] = $lp->tanggal_dokumen
			? $lp->tanggal_dokumen->format('d-m-Y')
			: null;

		return $array;
	}
}
