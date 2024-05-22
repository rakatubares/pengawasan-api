<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\ListPosisiPegawaiResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLphpResource extends JsonResource
{
	/**
	* Transform the resource into an array for display.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	*/
	public function toArray($request)
	{
		$array = $this->lphpArray();

		$lptp = $this->chain->lptp;
		$array['lptp_id'] = $lptp != null ? $lptp->id : null;
		$array['nomor_lptp'] = $lptp != null ? $lptp->no_dok_lengkap : null;
		$array['tanggal_lptp'] = $lptp != null ? $lptp->tanggal_dokumen->format('d-m-Y') : null;

		return $array;
	}

	protected function lphpArray() {
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen
				? $this->tanggal_dokumen->format('d-m-Y')
				: null,
			'analisa' => $this->analisa,
			'catatan' => $this->catatan,
			'penindakan' => new PenindakanResource($this->chain->penindakan),
			'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
			'kode_status' => $this->kode_status,
		];

		return $array;
	}
}
