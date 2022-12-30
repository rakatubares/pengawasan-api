<?php

namespace App\Http\Resources;

class DokRiksaBadanResource extends RequestBasedResource
{
	protected function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'asal' => $this->asal,
			'tujuan' => $this->tujuan,
			'uraian_pemeriksaan' => $this->uraian_pemeriksaan,
			'hasil_pemeriksaan' => $this->hasil_pemeriksaan,
			'orang' => new RefEntitasResource($this->penindakan->objectable),
			'pendamping' => new RefEntitasResource($this->pendamping),
			'sarkut' => new DetailSarkutResource($this->sarkut),
			'dokumen' => new DetailDokumenResource($this->dokumen),
			'saksi' => new RefEntitasResource($this->saksi),
		];

		return $array;
	}

	protected function display()
	{
		$array = $this->basic();
		$array['penindakan'] = new PenindakanResource($this->penindakan, 'basic');
		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['kode_status'] = $this->kode_status;

		return $array;
	}

	protected function form()
	{
		$array = $this->basic();
		$array['penindakan'] = new PenindakanResource($this->penindakan, 'basic');
		return $array;
	}
}
