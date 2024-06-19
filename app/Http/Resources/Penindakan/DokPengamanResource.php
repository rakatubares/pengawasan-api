<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\RefUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokPengamanResource extends JsonResource
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
			'alasan_pengamanan' => $this->alasan_pengamanan,
			'keterangan' => $this->keterangan,
			'jenis_pengaman' => $this->jenis_pengaman,
			'jumlah_pengaman' => $this->jumlah_pengaman,
			'satuan_pengaman' => $this->satuan_pengaman,
			'nomor_pengaman' => $this->nomor_pengaman,
			'tempat_pengaman' => $this->tempat_pengaman,
			'penindakan' => new PenindakanResource($this->chain->penindakan),
			'kode_status' => $this->kode_status,
			'created_by' => new RefUserResource($this->creator),
		];

		return $array;
	}
}
