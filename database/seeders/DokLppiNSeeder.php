<?php

namespace Database\Seeders;

class DokLppiNSeeder extends DokLppiSeeder
{
	public function __construct()
	{
		$this->tipe_dok = 'lppin';
		$this->prepareModel();
	}
}
