<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MonTarikSbpResource extends JsonResource
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
			'lokasi_penindakan' => $this->penindakan->lokasi_penindakan,
			'status_penarikan' => $this->status_penarikan,
			'tanggal_penarikan' => $this->tanggal_penarikan 
				? $this->tanggal_penarikan->format('d-m-Y') 
				: null,
			'petugas_penarikan' => $this->petugas_penarikan
				? new RefUserResource($this->petugas_penarikan)
				: null,
			'lokasi_penyimpanan' => $this->lokasi_penyimpanan
				? $this->lokasi_penyimpanan
				: null,
			'keterangan_penarikan' => $this->keterangan_penarikan
				? $this->keterangan_penarikan
				: null
		];

		return $array;
	}
}
