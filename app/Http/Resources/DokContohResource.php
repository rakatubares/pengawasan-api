<?php

namespace App\Http\Resources;

class DokContohResource extends RequestBasedResource
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
			'lokasi' => $this->lokasi,
			'sprint' => new RefSprintResource($this->sprint),
			'saksi' => new RefEntitasResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		return $array;
	}

	protected function display()
	{
		return $this->basic();
	}

	protected function form()
	{
		return $this->basic();
	}

	protected function pdf()
	{
		$array = $this->basic();
		$array['objek'] = $this->objek();
		$array['kode_status'] = $this->kode_status;
		return $array;
	}

	protected function objek()
	{
		return new ObjectResource($this->objectable, 'barang');
	}
}
