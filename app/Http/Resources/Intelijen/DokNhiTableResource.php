<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\DokTableResource;

class DokNhiTableResource extends DokTableResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$kegiatan = '-';
		if (in_array($this->detail_type, ['nhi-exim', 'nhin-exim'])) {
			$kegiatan = $this->detail['tipe'];
		}

		$array = $this->makeBasicArray();
		$array['kegiatan'] = $kegiatan;
		$array['no_lkai'] = $this->chain->lkai
			? $this->chain->lkai->no_dok_lengkap
			: '-';
		$array['tgl_lkai'] = $this->chain->lkai
			? $this->chain->lkai->tanggal_dokumen->format('d-m-Y')
			: '';

		return $array;
	}
}
