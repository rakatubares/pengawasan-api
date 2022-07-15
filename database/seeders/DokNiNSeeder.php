<?php

namespace Database\Seeders;

class DokNiNSeeder extends DokNiSeeder
{
	public function __construct()
	{
		$this->tipe_ni = 'nin';
		$this->tipe_lkai = 'lkain';
		$this->status_lkai = 223;
		$this->prepareModel();
	}
}
