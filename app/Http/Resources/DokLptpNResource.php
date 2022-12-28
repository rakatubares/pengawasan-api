<?php

namespace App\Http\Resources;

class DokLptpNResource extends DokLptpResource
{
	protected function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'alasan_tidak_penindakan' => $this->alasan_tidak_penindakan,
			'catatan' => $this->catatan,
			'kode_status' => $this->kode_status,
		];

		return $array;
	}
}
