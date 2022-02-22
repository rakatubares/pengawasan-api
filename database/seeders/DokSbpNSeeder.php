<?php

namespace Database\Seeders;

class DokSbpNSeeder extends DokSbpSeeder
{
	public function __construct()
	{
		$this->tipe_dok = 'sbpn';
		$this->tipe_lptp = 'lptpn';
		$this->prepareModel();
	}
}
