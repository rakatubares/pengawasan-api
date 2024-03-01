<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\References\RefKantorBCResource;
use App\Http\Resources\TembusanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokNhiResource extends JsonResource
{
	/**
	 * Transform the resource into an array for display.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$lkai = $this->chain->lkai;
		
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen
				? $this->tanggal_dokumen->format('d-m-Y') 
				: null,
			'lkai_id' => $lkai != null ? $lkai->id : null,
			'nomor_lkai' => $lkai != null ? $lkai->no_dok_lengkap : null,
			'tanggal_lkai' => $lkai != null ? $lkai->tanggal_dokumen->format('d-m-Y') : null,
			'sifat' => $this->sifat,
			'klasifikasi' => $this->klasifikasi,
			'tujuan' => $this->tujuan,
			'tempat_indikasi' => $this->tempat_indikasi,
			'waktu_indikasi' => $this->waktu_indikasi
				? $this->waktu_indikasi->format('d-m-Y H:i:s') 
				: null,
			'zona_waktu' => $this->zona_waktu,
			'kantor' => new RefKantorBCResource($this->kantor),
			'detail' => new DokNhiDetailResource($this->detail, $this->detail_type),
			'indikasi' => $this->indikasi,
			'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
			'tembusan' => TembusanResource::collection($this->tembusan),
			'kode_status' => $this->kode_status,
		];

		return $array;
	}
}
