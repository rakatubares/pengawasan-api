<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\ListPosisiPegawaiResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokSbpResource extends JsonResource
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
			'lap_id' => $this->chain->lap ? $this->chain->lap->id : null,
			'penindakan' => new PenindakanResource($this->chain->penindakan),
			'lptp' => [
				'no_dok_lengkap' => $this->chain->lptp->no_dok_lengkap,
				'catatan' => $this->chain->lptp->catatan,
				'petugas' => ListPosisiPegawaiResource::associative($this->chain->lptp->detail_petugas),
			],
			'kode_status' => $this->kode_status,
		];
		return $array;
	}
}
