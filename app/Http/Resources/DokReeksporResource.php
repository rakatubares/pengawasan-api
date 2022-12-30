<?php

namespace App\Http\Resources;

class DokReeksporResource extends RequestBasedResource
{
	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	protected function basic()
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
			'jenis_dok_asal' => $this->jenis_dok_asal,
			'nomor_dok_asal' => $this->nomor_dok_asal,
			'tanggal_dok_asal' => $this->tanggal_dok_asal
				? $this->tanggal_dok_asal->format('d-m-Y')
				: null,
			'jenis_dok_ekspor' => $this->jenis_dok_ekspor,
			'nomor_dok_ekspor' => $this->nomor_dok_ekspor,
			'tanggal_dok_ekspor' => $this->tanggal_dok_ekspor
				? $this->tanggal_dok_ekspor->format('d-m-Y')
				: null,
			'nomor_mawb' => $this->nomor_mawb,
			'tanggal_mawb' => $this->tanggal_mawb
				? $this->tanggal_mawb->format('d-m-Y')
				: null,
			'nomor_hawb' => $this->nomor_hawb,
			'tanggal_hawb' => $this->tanggal_hawb
				? $this->tanggal_hawb->format('d-m-Y')
				: null,
			'nama_sarkut' => $this->nama_sarkut,
			'nomor_flight' => $this->nomor_flight,
			'tanggal_flight' => $this->tanggal_flight
				? $this->tanggal_flight->format('d-m-Y')
				: null,
			'nomor_reg_sarkut' => $this->nomor_reg_sarkut,
			'kedapatan' => $this->kedapatan,
			'saksi' => new RefEntitasResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		return $array;
	}

	protected function pdf()
	{
		$array = $this->basic();
		$array['kode_status'] = $this->kode_status;
		return $array;
	}
}
