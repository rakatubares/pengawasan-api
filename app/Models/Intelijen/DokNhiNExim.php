<?php

namespace App\Models\Intelijen;

class DokNhiNExim extends DokNhiExim
{
	protected $table = 'dok_nhin_exim';

	public function nhi() {
		return null;
	}

	public function nhin() {
		return $this->morphOne(DokNhiN::class, 'detail');
	}
}
