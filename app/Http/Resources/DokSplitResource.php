<?php

namespace App\Http\Resources;

class DokSplitResource extends RequestBasedResource
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
			'dugaan_pelanggaran' => $this->dugaan_pelanggaran,
			'petugas' => $this->list_petugas($this->petugas),
			'pemberi_perintah' => [
				'jabatan' => new JabatanResource($this->jabatan),
				'plh' => $this->plh,
				'user' => new RefUserResource($this->pejabat),
			],
			'tembusan' => $this->tembusan($this->tembusan),
		];
		return $array;
	}

	protected function form()
	{
		$array = $this->basic();
		$array['id_lpf'] = $this->lpf->id;
		return $array;
	}

	protected function display()
	{
		$penyidikan = $this->lpf->lpp->penyidikan;
		$sbp_type = $penyidikan->penindakan->sbp_relation->object2_type;
		$sbp = $penyidikan->penindakan->$sbp_type;
		$lp = $sbp->lptp->lphp->lp;

		$array = $this->basic();
		$array['penyidikan'] = new PenyidikanResource($penyidikan);
		$array['dokumen'] = [];
		$array['dokumen']['lp'] = new DokLpResource($lp, 'number');
		$array['dokumen']['lpf'] = new DokLpfResource($this->lpf, 'number');

		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['kode_status'] = $this->kode_status;

		return $array;
	}

	private function list_petugas()
	{
		$list_petugas = [];
		foreach ($this->petugas as $petugas) {
			$resource_petugas = new RefUserResource($petugas);
			$list_petugas[] = $resource_petugas;
		}
		return $list_petugas;
	}

	private function tembusan()
	{
		$cc_list = $this->tembusan->toArray();
		
		return array_map(function ($data) {
			return $data['uraian'];
		}, $cc_list);
	}
}
