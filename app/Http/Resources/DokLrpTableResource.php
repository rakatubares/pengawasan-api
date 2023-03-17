<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLrpTableResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$penindakan = $this->lhp->split->lpf->lpp->penyidikan->penindakan;
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
			'no_lhp' => $this->lhp->no_dok_lengkap,
			'tanggal_lhp' => $this->lhp->tanggal_dokumen->format('d-m-Y'),
			'penyidik' => $this->penyidik->name,
			'status' => new RefStatusResource($this->status)
		];

		return $array;
	}
}
