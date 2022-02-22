<?php

namespace Database\Seeders;

class DokLphpNSeeder extends DokLphpSeeder
{
	public function __construct()
	{
		$this->tipe_dok = 'lphpn';
		$this->tipe_lptp = 'lptpn';
		$this->prepareModel();
	}
}