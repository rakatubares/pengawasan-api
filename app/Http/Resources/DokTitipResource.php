<?php

namespace App\Http\Resources;

class DokTitipResource extends RequestBasedResource
{
	private function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen ? $this->tanggal_dokumen->format('d-m-Y') : null,
			'lokasi_titip' => $this->lokasi_titip,
			'sprint' => new RefSprintResource($this->sprint),
			'penerima' => new RefEntitasResource($this->penerima),
			'saksi' => new RefEntitasResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		return $array;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	protected function display()
	{
		$segel = $this->segel;

		$array = $this->basic();
		$array['nomor_segel'] = $segel->no_dok_lengkap;
		$array['tanggal_segel'] = $segel->penindakan->tanggal_penindakan->format('d-m-Y');

		return $array;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	protected function pdf()
	{
		$array = $this->display();
		$array['objek'] = $this->objek();
		$array['kode_status'] = $this->kode_status;

		if ($array['objek'] != null) {
			if ($array['objek']->type == 'barang') {
				$riksa = $this->segel->penindakan->riksa;
				if ($riksa != null) {
					$array['riksa'] = $riksa->no_dok_lengkap;
				}
			}
		}

		return $array;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	protected function form()
	{
		$array = $this->basic();
		$array['segel']['id'] = $this->segel->id;
		$array['segel']['nomor'] = $this->segel->no_dok_lengkap;
		$array['segel']['tanggal'] = $this->segel->penindakan->tanggal_penindakan->format('d-m-Y');

		return $array;
	}

	protected function objek()
	{
		return new ObjectResource($this->segel->penindakan->objectable, $this->segel->penindakan->object_type);
	}
}