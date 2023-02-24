<?php

namespace App\Http\Resources;

class DokLpfResource extends RequestBasedResource
{
	public function basic()
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
			'saksi' => new RefEntitasResource($this->saksi),
			'tanggal_bap_saksi' => $this->tanggal_bap_saksi
				? $this->tanggal_bap_saksi->format('d-m-Y')
				: null,
			'tersangka' => new RefEntitasResource($this->tersangka),
			'tanggal_bap_tersangka' => $this->tanggal_bap_tersangka
				? $this->tanggal_bap_tersangka->format('d-m-Y')
				: null,
			'resume_perkara' => $this->resume_perkara,
			'tanggal_resume_perkara' => $this->tanggal_resume_perkara
				? $this->tanggal_resume_perkara->format('d-m-Y')
				: null,
			'jenis_dokumen_lain' => $this->jenis_dokumen_lain,
			'nomor_dokumen_lain' => $this->nomor_dokumen_lain,
			'tanggal_dokumen_lain' => $this->tanggal_dokumen_lain
				? $this->tanggal_dokumen_lain->format('d-m-Y')
				: null,
			'kesimpulan' => $this->kesimpulan,
			'usulan' => $this->usulan,
			'catatan' => $this->catatan,
			'peneliti' => new RefUserResource($this->peneliti),
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
		];
		return $array;
	}

	protected function display()
	{
		$penyidikan = $this->lpp->penyidikan;
		$penindakan = $penyidikan->penindakan;
		$sbp_type = $penindakan->sbp_relation->object2_type;
		$sbp = $penindakan->$sbp_type;

		$array = $this->basic();
		$array['penyidikan'] = new PenyidikanResource($penyidikan);
		$array['penindakan'] = new PenindakanResource($penindakan, 'basic');
		$array['dokumen'] = [];
		$array['dokumen']['lpp'] = new DokLppResource($this->lpp, 'number');
		$array['dokumen']['sbp'] = new DokSbpResource($sbp, 'number');
		$array['dokumen']['lp'] = new DokLpResource($sbp->lptp->lphp->lp, 'number');

		return $array;
	}

	protected function form()
	{
		$array = $this->basic();
		$array['id_lpp'] = $this->lpp->id;
		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['barang'] = new DetailBarangResource($this->lpp->penyidikan->bhp);
		$array['kode_status'] = $this->kode_status;
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
