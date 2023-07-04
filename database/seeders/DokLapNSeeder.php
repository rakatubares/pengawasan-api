<?php

namespace Database\Seeders;

class DokLapNSeeder extends DokLapSeeder
{
	public function __construct()
	{
		$this->tipe_dok = 'lapn';
		$this->nama_informasi = [
			'nhin' => 'NHI-N',
			'lainnya' => 'Lainnya'
		];
		$this->list_jenis_informasi = array_keys($this->nama_informasi);
		$this->tipe_nhi = 'nhin';
		$this->seed_count = 10;
		$this->prepareModel();
	}
}
