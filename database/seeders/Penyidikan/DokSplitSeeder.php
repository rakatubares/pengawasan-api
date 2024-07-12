<?php

namespace Database\Seeders\Penyidikan;

use Database\Seeders\DokSeeder;

class DokSplitSeeder extends DokSeeder
{
	protected $docCode = 'split';

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Get available LPF ids
		$this->available_lpf_id = $this->getAvailableDocIds('lpf');

		for ($i=1; $i < 16; $i++) {
			// New Number
			$this->currentNumber = $this->getNewNumber();

			// Chain from LPF
			$chain = $this->chooseLpf();

			// Create SPLIT
			$creator = $this->choosePelaksana();

			$split = new $this->model;
			$split->no_dok = $this->currentNumber;
			$split->agenda_dok = $this->agendaDokumen;
			$split->thn_dok = $this->year;
			$split->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$split->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$split->chain_id = $chain->id;
			$split->dugaan_pelanggaran = $this->faker->text(rand(100,300));
			$split->kode_status = 'terbit';
			$split->created_by = $creator;
			$split->updated_by = $creator;
			$split->saveQuietly();

			/**
			 * Petugas
			 */

			// Petugas
			$availableNip = $this->nipPelaksana;
			$officerCount = rand(1,2);
			for ($x = 1; $x <= $officerCount; $x++) {
				// Choose CC
				$nip = $this->createPetugas($split, 'petugas', $availableNip);
				$availableNip = array_diff($availableNip, [$nip]);
			}

			// Pemberi Perintah
			$this->createPejabat($split, 'pejabat', 'bd.0505', '156748');

			// Create tembusan
			$this->createTembusan($split);

			// Update Chain
			$chain->update(['latest_document' => $split->kodeDokumen]);
		}

		$this->createPenomoran();
	}

	protected function chooseLpf()
	{
		$lpf = $this->chooseDocSource('lpf', $this->available_lpf_id);
		$this->available_lpf_id = array_diff($this->available_lpf_id, [$lpf->id]);
		return $lpf->chain;
	}
}
