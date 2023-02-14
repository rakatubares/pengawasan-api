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
			'catatan' => $this->catatan,
			'petugas' => new RefUserResource($this->petugas),
			'atasan1' => [
				'jabatan' => new JabatanResource($this->jabatan1),
				'plh' => $this->plh1,
				'user' => new RefUserResource($this->pejabat1),
			],
			'atasan2' => [
				'jabatan' => new JabatanResource($this->jabatan2),
				'plh' => $this->plh2,
				'user' => new RefUserResource($this->pejabat2),
			],
			'kode_status' => $this->kode_status,
		];
		return $array;
	}

	protected function display()
	{
		$penyidikan = $this->penyidikan;
		$sbp_type = $penyidikan->penindakan->sbp_relation->object2_type;
		$sbp = $penyidikan->penindakan->$sbp_type;
		$lp = $sbp->lptp->lphp->lp;

		$array = $this->basic();
		$array['penyidikan'] = new PenyidikanResource($penyidikan);
		$array['dokumen'] = [];
		$array['dokumen']['sbp'] = new DokSbpResource($sbp, 'number');
		$array['dokumen']['lp'] = new DokLpResource($lp, 'number');

		return $array;
	}

	protected function form()
	{
		$penyidikan = $this->penyidikan;
		$sbp_type = $penyidikan->penindakan->sbp_relation->object2_type;
		$lphp = $penyidikan->penindakan->$sbp_type->lptp->lphp;
		$lp_type = $lphp->lp_relation->object2_type;
		$id_lp = $lphp->lp->id;

		$array = $this->basic();
		$array['jenis_pelanggaran'] = $penyidikan->jenis_pelanggaran;
		$array['pasal'] = $penyidikan->pasal;
		$array['tempat_pelanggaran'] = $penyidikan->tempat_pelanggaran;
		$array['waktu_pelanggaran'] = $penyidikan->waktu_pelanggaran->format('d-m-Y H:i:s');
		$array['modus'] = $penyidikan->modus;
		$array['pelaku'] = new RefEntitasResource($penyidikan->pelaku);
		$array['status_penangkapan'] = $penyidikan->status_penangkapan;
		$array['lp_type'] = $lp_type;
		$array['id_lp'] = $id_lp;
		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['barang'] = new DetailBarangResource($this->penyidikan->bhp);
		return $array;
	}

	protected function number()
	{
		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen->format('d-m-Y'),
		];

		return $array;
	}
}
