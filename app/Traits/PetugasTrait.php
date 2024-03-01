<?php

namespace App\Traits;

trait PetugasTrait 
{
	private $document;

	private function setDocument($doc) 
	{
		$this->document = $doc;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Create functions
	 |--------------------------------------------------------------------------
	 */
	protected function savePetugas($petugas, $doc) 
	{
		$this->setDocument($doc);

		foreach ($petugas as $key => $value) {
			if ($value['nip'] != null) {
				if (array_key_exists('flag_pejabat', $value)) {
					if ($value['flag_pejabat'] == true) {
						$this->savePejabat($key, $value);
					} else {
						$this->saveNonPejabat($key, $value);
					}
				} else {
					$this->saveNonPejabat($key, $value);
				}
			}
		}
	}

	protected function saveNonPejabat($posisi, $petugas) 
	{
		$data = [
			'posisi' => $posisi, 
			'flag_pejabat' => false, 
			'nip' => $petugas['nip'],
		];
		$this->document->detail_petugas()->create($data);
	}

	protected function savePejabat($posisi, $petugas) 
	{
		$data = [
			'posisi' => $posisi, 
			'flag_pejabat' => true, 
			'kode_jabatan' => $petugas['kode_jabatan'],
			'tipe_ttd' => $petugas['tipe_ttd'],
			'nip' => $petugas['nip'],
		];
		$this->document->detail_petugas()->create($data);
	}

	/*
	 |--------------------------------------------------------------------------
	 | Update functions
	 |--------------------------------------------------------------------------
	 */

	protected function updatePetugas($petugas, $doc)
	{
		$this->setDocument($doc);

		// Get existing officers
		$existing_petugas = $this->document->detail_petugas;
		$existing_petugas_posisi = [];
		$existing_posisi = [];
		foreach ($existing_petugas as $p) {
			$existing_petugas_posisi[$p['posisi']] = $p;
			$existing_posisi[] = $p['posisi'];
		}

		// Update officers
		$new_posisi = [];
		foreach ($petugas as $posisi => $value) {
			if ($value['nip'] != null) {
				$new_posisi[] = $posisi;
				if (array_key_exists('flag_pejabat', $value)) {
					if ($value['flag_pejabat'] == true) {
						if (in_array($posisi, $existing_posisi)) {
							$this->updatePejabat($posisi, $value);
						} else {
							$this->savePejabat($posisi, $value);
						}
					} else {
						if (in_array($posisi, $existing_posisi)) {
							$this->updateNonPejabat($posisi, $value);
						} else {
							$this->saveNonPejabat($posisi, $value);
						}
					}
				} else {
					if (in_array($posisi, $existing_posisi)) {
						$this->updateNonPejabat($posisi, $value);
					} else {
						$this->saveNonPejabat($posisi, $value);
					}
				}
			}
		}

		// Delete officers
		$deleted_posisi = [];
		$still_posisi = [];
		foreach ($existing_posisi as $posisi) {
			if (!in_array($posisi, $new_posisi)) {
				$deleted_posisi[] = $posisi;
				$this->deletePetugas($posisi);
			} else {
				$still_posisi[] = $posisi;
			}
		}
	}

	protected function updateNonPejabat($posisi, $petugas) 
	{
		$data = [
			'nip' => $petugas['nip'],
		];
		$this->document->detail_petugas()->where('posisi', $posisi)->update($data);
	}

	protected function updatePejabat($posisi, $petugas) 
	{
		$data = [
			'kode_jabatan' => $petugas['kode_jabatan'],
			'tipe_ttd' => $petugas['tipe_ttd'],
			'nip' => $petugas['nip'],
		];
		$this->document->detail_petugas()->where('posisi', $posisi)->update($data);
	}

	protected function deletePetugas($posisi) {
		$this->document->detail_petugas()->where('posisi', $posisi)->delete();
	}
}