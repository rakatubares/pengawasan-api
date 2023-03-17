<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLrpResource extends RequestBasedResource
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
			'no_lk' => $this->no_lk,
			'tanggal_lk' => $this->tanggal_lk
				? $this->tanggal_lk->format('d-m-Y')
				: null,
			'no_sptp' => $this->no_sptp,
			'tanggal_sptp' => $this->tanggal_sptp
				? $this->tanggal_sptp->format('d-m-Y')
				: null,
			'no_spdp' => $this->no_spdp,
			'tanggal_spdp' => $this->tanggal_spdp
				? $this->tanggal_spdp->format('d-m-Y')
				: null,
			'alat_bukti_surat' => $this->alat_bukti_surat,
			'alat_bukti_petunjuk' => $this->alat_bukti_petunjuk,
			'alternatif_penyelesaian' => $this->alternatif_penyelesaian,
			'informasi_lain' => $this->informasi_lain,
			'catatan' => $this->catatan,
			'saksi' => $this->list_entitas($this->saksi),
			'ahli' => $this->list_entitas($this->ahli),
			'penyidik' => new RefUserResource($this->penyidik),
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
		$penyidikan = $this->lhp->split->lpf->lpp->penyidikan;
		$sbp_type = $penyidikan->penindakan->sbp_relation->object2_type;
		$lp = $penyidikan->penindakan->$sbp_type->lptp->lphp->lp;

		$array = $this->basic();
		$array['penyidikan'] = new PenyidikanResource($penyidikan);
		$array['dokumen'] = [];
		$array['dokumen']['lp'] = new DokLpResource($lp, 'number');
		$array['dokumen']['lhp'] = new DokLhpResource($this->lhp, 'number');

		return $array;
	}

	protected function form()
	{
		$array = $this->basic();
		$array['id_lhp'] = $this->lhp->id;
		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['barang'] = new DetailBarangResource($this->lhp->split->lpf->lpp->penyidikan->bhp);
		$array['kode_status'] = $this->kode_status;

		return $array;
	}

	private function list_entitas($object_entitas)
	{
		$list_entitas = [];
		foreach ($object_entitas as $entitas) {
			$resource_entitas = new RefEntitasResource($entitas);
			$list_entitas[] = $resource_entitas;
		}
		return $list_entitas;
	}
}
