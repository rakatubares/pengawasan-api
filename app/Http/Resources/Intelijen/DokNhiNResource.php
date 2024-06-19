<?php

namespace App\Http\Resources\Intelijen;

class DokNhiNResource extends DokNhiResource
{
	/**
	 * Transform the resource into an array for display.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$array = $this->nhiArray();
		
		$lkain = $this->chain->lkain;
		$array['lkain_id'] = $lkain != null ? $lkain->id : null;
		$array['nomor_lkain'] = $lkain != null ? $lkain->no_dok_lengkap : null;
		$array['tanggal_lkain'] = $lkain != null ? $lkain->tanggal_dokumen->format('d-m-Y') : null;

		return $array;
	}
}
