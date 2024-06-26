<?php

namespace App\Http\Resources\Penyidikan;

use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\References\RefKategoriPelanggaranResource;
use App\Http\Resources\RefUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLppResource extends JsonResource
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
			'asal_perkara' => $this->asal_perkara,
			'jenis_penindakan' => $this->jenis_penindakan,
			'jenis_perkara' => new RefKategoriPelanggaranResource($this->jenis_perkara),
			'catatan' => $this->catatan,
			'penyidikan' => new PenyidikanResource($this->chain->penyidikan),
			'sbp' => [
				'no_dok_lengkap' => $this->chain->sbp
					? $this->chain->sbp->no_dok_lengkap
					: $this->chain->sbpn->no_dok_lengkap,
				'tanggal_dokumen' => $this->chain->sbp
					? $this->chain->sbp->tanggal_dokumen->format('d-m-Y')
					: $this->chain->sbpn->tanggal_dokumen->format('d-m-Y')
			],
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
			'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
			'kode_status' => $this->kode_status,
			'created_by' => new RefUserResource($this->creator),
		];
		return $array;
	}
}
