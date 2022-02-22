<?php

namespace Database\Seeders;

class DokLpNSeeder extends DokLpSeeder
{
	public function __construct()
	{
		$this->tipe_dok = 'lpn';
		$this->tipe_lphp = 'lphpn';
		$this->prepareModel();
	}
}
