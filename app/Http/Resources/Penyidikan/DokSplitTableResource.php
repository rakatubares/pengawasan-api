<?php

namespace App\Http\Resources\Penyidikan;

use App\Http\Resources\DokTableResource;

class DokSplitTableResource extends DokTableResource
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

		$lp = $this->chain->lp ? $this->chain->lp : $this->chain->lpn;
		$array['nomor_lp'] = $lp->no_dok_lengkap;
		$array['tanggal_lp'] = $lp->tanggal_dokumen
			? $lp->tanggal_dokumen->format('d-m-Y')
			: null;

		$lpf = $this->chain->lpf;
		$array['nomor_lpf'] = $lpf->no_dok_lengkap;
		$array['tanggal_lpf'] = $lpf->tanggal_dokumen
			? $lpf->tanggal_dokumen->format('d-m-Y')
			: null;

		return $array;
	}
}
