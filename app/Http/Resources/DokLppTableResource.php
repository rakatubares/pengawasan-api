<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLppTableResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$penindakan = $this->penyidikan->penindakan;
		$sbp_type = $penindakan->sbp_relation->object2_type;
		$sbp = $penindakan->$sbp_type;
		$lp = $sbp->lptp->lphp->lp;

		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen 
				? $this->tanggal_dokumen->format('d-m-Y') 
				: null,
			'no_sbp' => $sbp->no_dok_lengkap,
			'tanggal_sbp' => $penindakan->tanggal_penindakan->format('d-m-Y'),
			'no_lp' => $lp->no_dok_lengkap,
			'tanggal_lp' => $lp->tanggal_dokumen->format('d-m-Y'),
			'petugas' => $this->petugas->name,
			'status' => new RefStatusResource($this->status)
		];

		return $array;
	}
}
