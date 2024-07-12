<?php

namespace App\Http\Resources\Penyidikan;

use App\Http\Resources\Entitas\EntitasOrangResource;
use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\Penindakan\PenindakanResource;
use App\Http\Resources\RefUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLpfResource extends JsonResource
{
	/**
	* Transform the resource into an array for display.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	*/
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen
				? $this->tanggal_dokumen->format('d-m-Y')
				: null,
			'saksi' => new EntitasOrangResource($this->saksi),
			'tanggal_bap_saksi' => $this->tanggal_bap_saksi
				? $this->tanggal_bap_saksi->format('d-m-Y')
				: null,
			'tersangka' => new EntitasOrangResource($this->tersangka),
			'tanggal_bap_tersangka' => $this->tanggal_bap_tersangka
				? $this->tanggal_bap_tersangka->format('d-m-Y')
				: null,
			'resume_perkara' => $this->resume_perkara,
			'tanggal_resume_perkara' => $this->tanggal_resume_perkara
				? $this->tanggal_resume_perkara->format('d-m-Y')
				: null,
			'jenis_dokumen_lain' => $this->jenis_dokumen_lain,
			'nomor_dokumen_lain' => $this->nomor_dokumen_lain,
			'tanggal_dokumen_lain' => $this->tanggal_dokumen_lain
				? $this->tanggal_dokumen_lain->format('d-m-Y')
				: null,
			'kesimpulan' => $this->kesimpulan,
			'usulan' => $this->usulan,
			'catatan' => $this->catatan,
			'penindakan' => new PenindakanResource($this->chain->penindakan),
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
				'no_dok_lengkap' => $this->chain->lp
					? $this->chain->lp->no_dok_lengkap
					: $this->chain->lpn->no_dok_lengkap,
				'tanggal_dokumen' => $this->chain->lp
					? $this->chain->lp->tanggal_dokumen->format('d-m-Y')
					: $this->chain->lpn->tanggal_dokumen->format('d-m-Y')
			],
			'lpp' => [
				'id' => $this->chain->lpp->id,
				'no_dok_lengkap' => $this->chain->lpp->no_dok_lengkap,
				'tanggal_dokumen' => $this->chain->lpp->tanggal_dokumen->format('d-m-Y'),
			],
			'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
			'kode_status' => $this->kode_status,
			'created_by' => new RefUserResource($this->creator),
		];
	}
}
