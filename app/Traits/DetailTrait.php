<?php

namespace App\Traits;

use App\Models\DetailSarkut;

trait DetailTrait
{
	/*
	 |--------------------------------------------------------------------------
	 | Sarkut functions
	 |--------------------------------------------------------------------------
	 */

	private function prepareSarkut($sarkut)
	{
		$data_sarkut = [
			'nama_sarkut' => $sarkut['nama_sarkut'],
			'jenis_sarkut' => $sarkut['jenis_sarkut'],
			'no_flight_trayek' => $sarkut['no_flight_trayek'],
			'pilot_id' => $sarkut['pilot']['id'],
			'bendera' => $sarkut['bendera'],
			'no_reg_polisi' => $sarkut['no_reg_polisi'],
		];
		return $data_sarkut;
	}
	
	private function createSarkut($sarkut)
	{
		$data_sarkut = $this->prepareSarkut($sarkut);
		$sarkut = DetailSarkut::create($data_sarkut);
		return $sarkut;
	}

	private function updateSarkut($sarkut, $sarkut_id)
	{
		$data_sarkut = $this->prepareSarkut($sarkut);
		DetailSarkut::find($sarkut_id)->update($data_sarkut);
	}

	private function deleteSarkut($sarkut_id)
	{
		DetailSarkut::find($sarkut_id)->delete();
	}

	/*
	 |--------------------------------------------------------------------------
	 | Dokumen functions
	 |--------------------------------------------------------------------------
	 */

	private function prepareDocument($dokumen)
	{
		$data_dokumen = [
			'jns_dok' => $dokumen['jns_dok'],
			'no_dok' => $dokumen['no_dok'],
			'tgl_dok' => $dokumen['tgl_dok'],
		];
		return $data_dokumen;
	}

	private function createDocument($dokumen)
	{
		$data_dokumen = $this->prepareDocument($dokumen);
		$this->doc->dokumen()->create($data_dokumen);
	}

	private function updateDocument($dokumen)
	{
		$data_dokumen = $this->prepareDocument($dokumen);
		$this->doc->dokumen()->update($data_dokumen);
	}

	private function deleteDocument()
	{
		$this->doc->dokumen()->delete();
	}

	/*
	 |--------------------------------------------------------------------------
	 | Orang functions
	 |--------------------------------------------------------------------------
	 */

	private function penindakanOrang($orang)
	{
		$this->penindakan->update([
			'object_type' => 'orang', 
			'object_id' => $orang['id'],
			'saksi_id' => $orang['id'],
		]);
	}
}