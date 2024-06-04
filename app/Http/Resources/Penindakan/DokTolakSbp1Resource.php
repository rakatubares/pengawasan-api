<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\RefUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokTolakSbp1Resource extends JsonResource
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
			'alasan' => $this->alasan,
			'penindakan' => new PenindakanResource($this->tolakable->chain->penindakan),
			'sbp' => [
				'type' => $this->tolakable->kode_dokumen,
				'id' => $this->tolakable->id,
				'no_dok_lengkap' => $this->tolakable->no_dok_lengkap,
				'tanggal_dokumen' => $this->tolakable->tanggal_dokumen
					? $this->tolakable->tanggal_dokumen->format('d-m-Y')
					: null,
			],
			'kode_status' => $this->kode_status,
			'created_by' => new RefUserResource($this->creator),
		];

		return $array;
	}
}
