<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokSplitTableResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$penyidikan = $this->lpf->lpp->penyidikan;
		$penindakan = $penyidikan->penindakan;
		$sbp_type = $penindakan->sbp_relation->object2_type;
		$sbp = $penindakan->$sbp_type;
		$lp = $sbp->lptp->lphp->lp;

		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen 
				? $this->tanggal_dokumen->format('d-m-Y') 
				: null,
			'no_lp' => $lp->no_dok_lengkap,
			'tanggal_lp' => $lp->tanggal_dokumen->format('d-m-Y'),
			'no_lpf' => $this->lpf->no_dok_lengkap,
			'tanggal_lpf' => $this->lpf->tanggal_dokumen->format('d-m-Y'),
			'pelaku' => $penyidikan->pelaku->nama,
			'status' => new RefStatusResource($this->status)
		];

		return $array;
	}
}
