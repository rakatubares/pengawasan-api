<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\ListPosisiPegawaiResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLppiResource extends JsonResource
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
			'flag_info_internal' => $this->flag_info_internal == 1 ? true : false,
			'media_info_internal' => $this->media_info_internal,
			'tgl_terima_info_internal' => $this->tgl_terima_info_internal
				? $this->tgl_terima_info_internal->format('d-m-Y') 
				: null,
			'no_dok_info_internal' => $this->no_dok_info_internal,
			'tgl_dok_info_internal' => $this->tgl_dok_info_internal
				? $this->tgl_dok_info_internal->format('d-m-Y') 
				: null,
			'flag_info_eksternal' => $this->flag_info_eksternal == 1 ? true : false,
			'media_info_eksternal' => $this->media_info_eksternal,
			'tgl_terima_info_eksternal' => $this->tgl_terima_info_eksternal
				? $this->tgl_terima_info_eksternal->format('d-m-Y') 
				: null,
			'no_dok_info_eksternal' => $this->no_dok_info_eksternal,
			'tgl_dok_info_eksternal' => $this->tgl_dok_info_eksternal
				? $this->tgl_dok_info_eksternal->format('d-m-Y') 
				: null,
			'kesimpulan' => $this->kesimpulan,
			'tanggal_disposisi' => $this->tanggal_disposisi
				? $this->tanggal_disposisi->format('d-m-Y') 
				: null,
			'flag_analisis' => $this->flag_analisis == 1 ? true : false,
			'flag_arsip' => $this->flag_arsip == 1 ? true : false,
			'catatan' => $this->catatan,
			'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
			'informasi' => InformasiResource::collection($this->informasi),
			'kode_status' => $this->kode_status,
		];

		return $array;
	}
}
