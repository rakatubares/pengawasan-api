<?php

namespace App\Http\Resources\Penyidikan;

use App\Http\Resources\PosisiPegawaiResource;
use App\Http\Resources\RefUserResource;
use App\Http\Resources\TembusanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokSplitResource extends JsonResource
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
			'dugaan_pelanggaran' => $this->dugaan_pelanggaran,
			'penyidikan' => new PenyidikanResource($this->chain->penyidikan),
			'lp' => [
				'type' => $this->chain->lp ? 'lp' : 'lpn',
				'id' => $this->chain->lp
					? $this->chain->lp->id
					: $this->chain->lpn->id,
				'no_dok_lengkap' => $this->chain->lp
					? $this->chain->lp->no_dok_lengkap
					: $this->chain->lpn->no_dok_lengkap,
				'tanggal_dokumen' => $this->chain->lp
					? $this->chain->lp->tanggal_dokumen->format('d-m-Y')
					: $this->chain->lpn->tanggal_dokumen->format('d-m-Y')
			],
			'lpf' => [
				'id' => $this->chain->lpf->id,
				'no_dok_lengkap' => $this->chain->lpf->no_dok_lengkap,
				'tanggal_dokumen' => $this->chain->lpf->tanggal_dokumen->format('d-m-Y'),
			],
			'petugas' => $this->list_petugas(),
			'tembusan' => TembusanResource::collection($this->tembusan),
			'kode_status' => $this->kode_status,
			'created_by' => new RefUserResource($this->creator),
		];
		return $array;
	}

	private function list_petugas()
	{
		$list_petugas = [];
		$list_pelaksana = [];
		foreach ($this->detail_petugas as $petugas) {
			$resource_petugas = new PosisiPegawaiResource($petugas);
			if ($petugas['posisi'] == 'petugas') {
				$list_pelaksana[] = $resource_petugas;
			} else {
				$list_petugas[$petugas['posisi']] = $resource_petugas;
			}
		}
		$list_petugas['pelaksana'] = $list_pelaksana;
		return $list_petugas;
	}
}
