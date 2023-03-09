<?php

namespace App\Http\Resources;

class DokLhpResource extends RequestBasedResource
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
			'kesimpulan' => $this->kesimpulan,
			'alternatif_penyelesaian' => $this->alternatif_penyelesaian,
			'informasi_lain' => $this->informasi_lain,
			'catatan' => $this->catatan,
			'saksi' => $this->list_saksi($this->saksi),
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
		$penyidikan = $this->split->lpf->lpp->penyidikan;
		$sbp_type = $penyidikan->penindakan->sbp_relation->object2_type;
		$lp = $penyidikan->penindakan->$sbp_type->lptp->lphp->lp;

		$array = $this->basic();
		$array['penyidikan'] = new PenyidikanResource($penyidikan);
		$array['dokumen'] = [];
		$array['dokumen']['lp'] = new DokLpResource($lp, 'number');
		$array['dokumen']['split'] = new DokSplitResource($this->split, 'number');

		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['barang'] = new DetailBarangResource($this->split->lpf->lpp->penyidikan->bhp);
		$array['kode_status'] = $this->kode_status;

		return $array;
	}

	private function list_saksi()
	{
		$list_saksi = [];
		foreach ($this->saksi as $saksi) {
			$resource_saksi = new RefEntitasResource($saksi);
			$list_saksi[] = $resource_saksi;
		}
		return $list_saksi;
	}
}
