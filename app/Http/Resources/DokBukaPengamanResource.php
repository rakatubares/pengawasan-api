<?php

namespace App\Http\Resources;

class DokBukaPengamanResource extends RequestBasedResource
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
			'jenis_pengaman' => $this->jenis_pengaman,
			'jumlah_pengaman' => $this->jumlah_pengaman,
			'satuan_pengaman' => $this->satuan_pengaman,
			'tempat_pengaman' => $this->tempat_pengaman,
			'nomor_pengaman' => $this->nomor_pengaman,
			'tanggal_pengaman' => $this->tanggal_pengaman ? $this->tanggal_pengaman->format('d-m-Y') : null,
			'dasar_pengamanan' => $this->dasar_pengamanan,
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

		return $array;
	}

	protected function form()
	{
		$array = $this->basic();
		if ($this->penindakan->pengaman != null) {
			$array['pengaman'] = new DokPengamanResource($this->penindakan->pengaman, 'basic');
		} else {
			$array['pengaman'] = null;
		}
		return $array;
	}

	protected function objek()
	{
		return new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
	}
}
