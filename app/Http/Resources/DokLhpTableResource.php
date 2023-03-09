<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLhpTableResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$penindakan = $this->split->lpf->lpp->penyidikan->penindakan;
		$sbp_relation = $penindakan->sbp_relation;
		$sbp_type = $sbp_relation->object2_type;
		$lp = $penindakan->$sbp_type->lptp->lphp->lp;
		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen 
				? $this->tanggal_dokumen->format('d-m-Y') 
				: null,
			'no_lp' => $lp->no_dok_lengkap,
			'tanggal_lp' => $lp->tanggal_dokumen->format('d-m-Y'),
			'no_split' => $this->split->no_dok_lengkap,
			'tanggal_split' => $this->split->tanggal_dokumen->format('d-m-Y'),
			'peneliti' => $this->peneliti->name,
			'status' => new RefStatusResource($this->status)
		];

		return $array;
	}
}
