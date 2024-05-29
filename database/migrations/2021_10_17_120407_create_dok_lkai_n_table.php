<?php

class CreateDokLkaiNTable extends CreateDokLkaiTable
{
    public function __construct()
	{
		$this->table_name = 'dok_lkain';
		$this->kode_lpti = 'lptin';
		$this->kode_npi = 'npin';
		$this->kode_nhi = 'nhin';
		$this->kode_ni = 'nin';
	}
}
