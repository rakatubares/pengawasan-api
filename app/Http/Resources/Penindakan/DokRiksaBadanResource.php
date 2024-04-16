<?php

namespace App\Http\Resources\Penindakan;

use Illuminate\Http\Resources\Json\JsonResource;

class DokRiksaBadanResource extends JsonResource
{
	/**
	 * Transform the resource into an array for display.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen 
				? $this->tanggal_dokumen->format('d-m-Y') 
				: null,
			'uraian_pemeriksaan' => $this->uraian_pemeriksaan,
			'hasil_pemeriksaan' => $this->hasil_pemeriksaan,
			'penindakan' => new PenindakanResource($this->chain->penindakan),
			'kode_status' => $this->kode_status,
		];

		return $array;
	}
}
