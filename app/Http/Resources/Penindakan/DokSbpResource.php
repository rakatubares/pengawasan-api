<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\RefUserResource;
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
			'jenis_sumber' => $this->chain->nhi ? 'nhi' : null,
			'sumber_id' => $this->chain->nhi ? $this->chain->nhi->id : null,
			'penindakan' => new PenindakanResource($this->chain->penindakan),
			'lptp' => [
				'no_dok_lengkap' => $this->chain->lptp->no_dok_lengkap,
				'catatan' => $this->chain->lptp->catatan,
				'petugas' => ListPosisiPegawaiResource::associative($this->chain->lptp->detail_petugas),
			],
			'kode_status' => $this->kode_status,
			'created_by' => new RefUserResource($this->creator),
		];
		return $array;
	}
}
