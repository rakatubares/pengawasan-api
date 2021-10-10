<?php

namespace App\Traits;

use App\Models\SbpHeader;

trait SbpTrait
{
	/**
     * Update kolom jenis penindakan di tabel sbp_header
     *
	 * @param int sbp_header id
	 * @param string jenis kolom penindakan
	 * @param boolean status penindakan
     * @return \Illuminate\Http\Response
     */
	public function updateStatusPenindakan($sbp_id, $jenis_penindakan, $status_penindakan)
	{
		$kolom_penindakan = 'penindakan_' . $jenis_penindakan;
		$update_result = SbpHeader::find($sbp_id)
			->update([$kolom_penindakan => $status_penindakan]);
		return $update_result;
	}
}