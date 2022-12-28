<?php

namespace App\Http\Resources;

class DokBukaSegelResource extends RequestBasedResource
{
	protected function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'tanggal_dokumen' => $this->tanggal_dokumen ? $this->tanggal_dokumen->format('d-m-Y') : null,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'jenis_segel' => $this->jenis_segel,
			'jumlah_segel' => $this->jumlah_segel,
			'satuan_segel' => $this->satuan_segel,
			'nomor_segel' => $this->nomor_segel,
			'tanggal_segel' => $this->tanggal_segel ? $this->tanggal_segel->format('d-m-Y') : null,
			'tempat_segel' => $this->tempat_segel,
			'sprint' => new RefSprintResource($this->sprint),
			'saksi' => new RefEntitasResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		return $array;
	}

	protected function display()
	{
		$array = $this->basic();
		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['objek'] = $this->objek();
		$array['kode_status'] = $this->kode_status;

		if ($array['objek'] != null) {
			if ($array['objek']->type == 'barang') {
				$riksa = $this->penindakan->riksa;
				if ($riksa != null) {
					$array['riksa'] = $riksa->no_dok_lengkap;
				}
			}
		}

		return $array;
	}

	protected function objek()
	{
		return new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
	}

	protected function form()
	{
		$array = $this->basic();
		if ($this->penindakan->segel != null) {
			$array['segel'] = new DokSegelResource($this->penindakan->segel, 'basic');
		} else {
			$array['segel'] = null;
		}
		
		return $array;
	}
}
