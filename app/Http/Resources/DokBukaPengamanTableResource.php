<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokBukaPengamanTableResource extends JsonResource
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
			'tanggal_dokumen' => $this->tanggal_dokumen 
				? $this->tanggal_dokumen->format('d-m-Y') 
				: '-',
			'nomor_pengaman' => $this->nomor_pengaman,
			'tanggal_pengaman' => $this->tanggal_pengaman->format('d-m-Y'),
			'nama_saksi' => $this->saksi->nama,
			'petugas1' => $this->petugas1->name,
			'petugas2' => $this->petugas2 ? $this->petugas2->name : '',
			'status' => new RefStatusResource($this->status)
		];

		return $array;
	}
}
