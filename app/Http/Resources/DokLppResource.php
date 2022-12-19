<?php

namespace App\Http\Resources;

class DokLppResource extends RequestBasedResource
{
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
			'asal_perkara' => $this->asal_perkara,
			'jenis_penindakan' => $this->jenis_penindakan,
			'jenis_perkara' => $this->jenis_perkara,
			'status_pelanggaran' => $this->status_pelanggaran,
			'catatan' => $this->catatan,
			'petugas' => new RefUserResource($this->petugas, 'display'),
			'atasan1' => [
				'jabatan' => new JabatanResource($this->jabatan1),
				'plh' => $this->plh1,
				'user' => new RefUserResource($this->pejabat1, 'display'),
			],
			'atasan2' => [
				'jabatan' => new JabatanResource($this->jabatan2),
				'plh' => $this->plh2,
				'user' => new RefUserResource($this->pejabat2, 'display'),
			],
			'kode_status' => $this->kode_status,
		];
		return $array;
	}

	protected function display()
	{
		$penyidikan = $this->penyidikan;
		$sbp = $penyidikan->penindakan->sbp;
		$lp = $sbp->lptp->lphp->lp;

		$array = $this->basic();
		$array['penyidikan'] = new PenyidikanResource($penyidikan);
		$array['dokumen'] = [];
		$array['dokumen']['sbp'] = new DokSbpResource($sbp, 'number');
		$array['dokumen']['lp'] = new DokLpResource($lp, 'number');

		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$penindakan = $this->penyidikan->penindakan;
		if ($penindakan->object_type == 'barang') {
			$barang = new DetailBarangResource($penindakan->objectable);
		} else {
			$barang = null;
		}
		$array['barang'] = $barang;
		return $array;
	}
}
