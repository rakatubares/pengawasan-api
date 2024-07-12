<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use App\Traits\ConverterTrait;
use Illuminate\Http\Request;

class DokStiController extends DokController
{
	use ConverterTrait;

    protected $docType = 'sti';

	/**
	 * Prepare data from request to array
	 *
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	protected function prepareData(Request $request)
	{
		$tanggal_mulai = $this->dateFromText($request->tanggal_mulai);
		$tanggal_akhir = $this->dateFromText($request->tanggal_akhir);

		$data = [];
		$data['tugas'] = $request->tugas;
		$data['wilayah'] = $request->wilayah;
		$data['tanggal_mulai'] = $tanggal_mulai;
		$data['tanggal_akhir'] = $tanggal_akhir;
		$data['sifat'] = $request->sifat;
		$data['pakaian'] = $request->pakaian;
		return $data;
	}

	protected function storing(Request $request)
	{
		$data = parent::storing($request);
		$chain = $this->createChain();
		$data['chain_id'] = $chain->id;
		return $data;
	}

	protected function stored(Request $request)
	{
		// Tugas
		$this->createTugas($request->tugas);

		// Penerbit
		if ($request->has('petugas')) {
			$petugas = array_filter(
				$request->petugas,
				fn ($key) => $key != 'pengendali',
				ARRAY_FILTER_USE_KEY,
			);
			$petugas = array_filter(
				$petugas,
				fn ($key) => $key != 'tim',
				ARRAY_FILTER_USE_KEY,
			);
			$this->savePetugas($petugas, $this->doc);
		}

		// Pengendali
		$nip_pengendali = [];
		foreach ($request->petugas['pengendali'] as $pengendali) {
			if (
				($pengendali['nip'] != null) &
				(!in_array($pengendali['nip'], $nip_pengendali))
			) {
				$this->saveNonPejabat('pengendali', $pengendali, $this->doc);
				array_push($nip_pengendali, $pengendali['nip']);
			}
		}

		// Tim
		$nip_tim = [];
		foreach ($request->petugas['tim'] as $tim) {
			if (
				($tim['nip'] != null) &
				(!in_array($tim['nip'], $nip_tim))
			) {
				$this->saveNonPejabat('tim', $tim, $this->doc);
				array_push($nip_tim, $tim['nip']);
			}
		}

		// Tembusan
		if ($request->has('tembusan')) {$this->setTembusan($request->tembusan, $this->doc);}
	}

	private function createTugas($newTugas)
	{
		foreach ($newTugas as $tugas) {
			$this->doc->tugas()->create([
				'tugas' => $tugas
			]);
		}
	}

	protected function updated(Request $request)
	{
		// Tugas
		$this->updateTugas($request->tugas);

		// Penerbit
		if ($request->has('petugas')) {
			$petugas = array_filter(
				$request->petugas,
				fn ($key) => $key != 'pengendali',
				ARRAY_FILTER_USE_KEY,
			);
			$petugas = array_filter(
				$petugas,
				fn ($key) => $key != 'tim',
				ARRAY_FILTER_USE_KEY,
			);
			$this->savePetugas($petugas, $this->doc);
		}

		// Pengendali
		$this->updateListPetugas($request, 'pengendali');

		// Tim
		$this->updateListPetugas($request, 'tim');

		// Tembusan
		if ($request->has('tembusan')) {$this->setTembusan($request->tembusan, $this->doc);}
	}

	private function updateTugas($newTugas)
	{
		$oldTugas = $this->doc->tugas;

		// Update existing tasks or insert new tasks if the new ones more than old ones
		foreach ($newTugas as $k => $tugas) {
			if ($k < sizeof($oldTugas)) {
				$tugasId = $oldTugas[$k]['id'];
				$this->doc->tugas()->find($tugasId)->update([
					'tugas' => $tugas
				]);
			} else {
				$this->doc->tugas()->create([
					'tugas' => $tugas
				]);
			}
		}

		// Delete exceeding tasks if the old ones more than the new ones
		if (sizeof($newTugas) < sizeof($oldTugas)) {
			for ($i=sizeof($newTugas); $i < sizeof($oldTugas); $i++) {
				$tugasId = $oldTugas[$i]['id'];
				$this->doc->tugas()->find($tugasId)->delete($tugas);
			}
		}
	}

	private function updateListPetugas($request, $posisi)
	{
		// Get existing officers
		$existingPetugasNip = [];
		foreach ($this->doc->detail_petugas as $petugas) {
			if ($petugas['posisi'] == $posisi) {
				array_push($existingPetugasNip, $petugas['nip']);
			}
		}

		// Insert new officers
		$newPetugasNip = [];
		foreach ($request->petugas[$posisi] as $petugas) {
			if (!in_array($petugas['nip'], $existingPetugasNip)) {
				$this->saveNonPejabat($posisi, $petugas, $this->doc);
			}
			array_push($newPetugasNip, $petugas['nip']);
		}
		
		// Delete not chosen pelaksana
		foreach ($existingPetugasNip as $nip) {
			if (!in_array($nip, $newPetugasNip)) {
				$this->doc->detail_petugas()
					->where(['posisi' => $posisi, 'nip' => $nip])
					->delete();
			}
		}
	}
}
