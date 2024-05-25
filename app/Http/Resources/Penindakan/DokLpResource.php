<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\ListPosisiPegawaiResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLpResource extends JsonResource
{
	/**
	 * Transform the resource into an array for display.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request) 
	{
		$array = $this->lpArray();

		$lphp = $this->chain->lphp;
		$array['lphp_id'] = $lphp != null ? $lphp->id : null;
		$array['nomor_lphp'] = $lphp != null ? $lphp->no_dok_lengkap : null;
		$array['tanggal_lphp'] = $lphp != null ? $lphp->tanggal_dokumen->format('d-m-Y') : null;

		$sbp = $this->chain->sbp;
		$array['nomor_sbp'] = $sbp != null ? $sbp->no_dok_lengkap : null;
		$array['tanggal_sbp'] = $sbp != null ? $sbp->tanggal_dokumen->format('d-m-Y') : null;

		return $array;
	}

	protected function lpArray()
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
			'pasal' => $this->pasal,
			'modus' => $this->modus,
			'penindakan' => new PenindakanResource($this->chain->penindakan),
			'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
			'kode_status' => $this->kode_status,
		];

		return $array;
	}
}
