<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokSegelTableResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->penindakan->tanggal_penindakan 
				? $this->penindakan->tanggal_penindakan->format('d-m-Y') 
				: null,
			'nama_saksi' => $this->penindakan->saksi->nama,
			'petugas1' => $this->penindakan->petugas1->name,
			'status' => new RefStatusResource($this->status)
		];

		return $array;
	}
}
