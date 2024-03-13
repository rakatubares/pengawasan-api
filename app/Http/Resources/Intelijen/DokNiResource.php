<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\TembusanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokNiResource extends JsonResource
{
	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$array = $this->niArray();

		$lkai = $this->chain->lkai;
		$array['lkai_id'] = $lkai != null ? $lkai->id : null;
		$array['nomor_lkai'] = $lkai != null ? $lkai->no_dok_lengkap : null;
		$array['tanggal_lkai'] = $lkai != null ? $lkai->tanggal_dokumen->format('d-m-Y') : null;

		return $array;
	}

	public function niArray()
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
			'sifat' => $this->sifat,
			'klasifikasi' => $this->klasifikasi,
			'tujuan' => $this->tujuan,
			'uraian' => $this->uraian,
			'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
			'tembusan' => TembusanResource::collection($this->tembusan),
			'kode_status' => $this->kode_status,
		];

		return $array;
	}
}