<?php

namespace App\Http\Resources;

class DokLiResource extends RequestBasedResource
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
			'sumber' => $this->sumber,
			'informasi' => $this->informasi,
			'tindak_lanjut' => $this->tindak_lanjut,
			'catatan' => $this->catatan,
			'penerbit' => [
				'jabatan' => new JabatanResource($this->jabatan_penerbit),
				'plh' => $this->plh_penerbit,
				'user' => new RefUserResource($this->penerbit),
			],
			'atasan' => [
				'jabatan' => new JabatanResource($this->jabatan_atasan),
				'plh' => $this->plh_atasan,
				'user' => new RefUserResource($this->atasan),
			],
		];

		return $array;
	}

	protected function display()
	{
		return $this->basic();
	}

	protected function pdf()
	{
		$array = $this->basic();
		$array['kode_status'] = $this->kode_status;
		return $array;
	}
}
