<?php

namespace Database\Seeders;

class DokLkaiNSeeder extends DokLkaiSeeder
{
	public function __construct()
	{
		$this->tipe_lkai = 'lkain';
		$this->tipe_lppi = 'lppin';
		$this->prepareModel();
	}
}
