<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokRiksaBadanTableResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		// $orang = new RefEntitasResource($this->penindakan->objectable);

		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_penindakan' => $this->penindakan->tanggal_penindakan 
				? $this->penindakan->tanggal_penindakan->format('d-m-Y') 
				: '-',
			'nama_orang' => $this->penindakan->objectable->nama,
			'petugas1' => $this->penindakan->petugas1->name,
			'petugas2' => $this->penindakan->petugas2
				? $this->penindakan->petugas2->name
				: '',
			'status' => new RefStatusResource($this->status)
		];

		return $array;
	}
}
