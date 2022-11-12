<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokTolakSbp1TableResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$sbp_type = $this->sbp_relation->object1_type;

		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen ? $this->tanggal_dokumen->format('d-m-Y') : null,
			'nomor_sbp' => $this[$sbp_type]->no_dok_lengkap,
			'tanggal_sbp' => $this[$sbp_type]->penindakan->tanggal_penindakan->format('d-m-Y'),
			'nama_saksi' => $this[$sbp_type]->penindakan->saksi->nama,
			'petugas1' => $this->petugas1->name,
			'petugas2' => $this->petugas2 ? $this->petugas2->name : '',
			'status' => new RefStatusResource($this->status)
		];

		return $array;
	}
}
