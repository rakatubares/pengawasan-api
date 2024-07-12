<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\PosisiPegawaiResource;
use App\Http\Resources\RefUserResource;
use App\Http\Resources\TembusanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokStiResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
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
			'tugas' => $this->listTugas(),
			'wilayah' => $this->wilayah,
			'tanggal_mulai' => $this->tanggal_mulai
				? $this->tanggal_mulai->format('d-m-Y')
				: null,
			'tanggal_akhir' => $this->tanggal_akhir
				? $this->tanggal_akhir->format('d-m-Y')
				: null,
			'sifat' => $this->sifat,
			'pakaian' => $this->pakaian,
			'petugas' => $this->listPetugas(),
			'tembusan' => TembusanResource::collection($this->tembusan),
			'kode_status' => $this->kode_status,
			'created_by' => new RefUserResource($this->creator),
		];
	}

	private function listTugas()
	{
		$tugas = [];
		foreach ($this->tugas as $t) {
			$tugas[] = $t->tugas;
		}
		return $tugas;
	}

	private function listPetugas()
	{
		$pengendali = [];
		$tim = [];
		$list_petugas = [];
		foreach ($this->detail_petugas as $petugas) {
			$resource_petugas = new PosisiPegawaiResource($petugas);
			if ($petugas['posisi'] == 'pengendali') {
				$pengendali[] = $resource_petugas;
			} elseif ($petugas['posisi'] == 'tim') {
				$tim[] = $resource_petugas;
			} else {
				$list_petugas[$petugas['posisi']] = $resource_petugas;
			}
		}
		$list_petugas['pengendali'] = $pengendali;
		$list_petugas['tim'] = $tim;
		return $list_petugas;
	}
}
