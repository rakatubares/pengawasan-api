<?php

namespace App\Http\Resources;

class DokPengamanResource extends RequestBasedResource
{
	protected function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'alasan_pengamanan' => $this->alasan_pengamanan,
			'keterangan' => $this->keterangan,
			'jenis_pengaman' => $this->jenis_pengaman,
			'jumlah_pengaman' => $this->jumlah_pengaman,
			'satuan_pengaman' => $this->satuan_pengaman,
			'nomor_pengaman' => $this->nomor_pengaman,
			'tempat_pengaman' => $this->tempat_pengaman,
		];

		return $array;
	}

	protected function display()
	{
		$array = $this->basic();
		$array['penindakan'] = new PenindakanResource($this->penindakan, 'basic');
		return $array;
	}

	protected function form()
	{
		$array = $this->display();
		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['objek'] = $this->objek();
		$array['kode_status'] = $this->kode_status;

		return $array;
	}

	protected function objek()
	{
		return new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
	}
}
