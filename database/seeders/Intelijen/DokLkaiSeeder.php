<?php

namespace Database\Seeders\Intelijen;

use App\Models\DocumentsChain;
use Database\Seeders\DokSeeder;

class DokLkaiSeeder extends DokSeeder
{
	protected $docCode = 'lkai';

	public function __construct()
	{
		parent::__construct();
		$this->kodeLppi = $this->doc->kodeLppi;
		$this->kodeLpti = $this->doc->kodeLpti;
		$this->kodeNpi = $this->doc->kodeNpi;
		$this->kodeNhi = $this->doc->kodeNhi;
		$this->kodeNi = $this->doc->kodeNi;
		$this->tipeLpti = $this->doc->tipeLpti;
		$this->tipeNpi = $this->doc->tipeNpi;
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Initiate numbering for LPTI and NPI
		$this->crnLpti = 1;
		$this->crnNpi = 1;

		// Get available LPPI ids
		$this->available_lppi_id = $this->getAvailableDocIds($this->kodeLppi);

		for ($d=1; $d < 41; $d++) {
			// New Number
			$this->currentNumber = $this->getNewNumber();

			// Source documents
			$lpti = $this->generateLpti();
			$npi = $this->generateNpi();
			$lppi = $this->generateLppi();

			// Rekomendasi / informasi
			$rekomendasi = $this->faker->boolean() ? $this->faker->text() : null;
			$informasi_lain = $this->faker->boolean() ? $this->faker->text() : null;

			// Create LKAI
			$creator = $this->choosePelaksana();

			$field_nomor_lpti = 'nomor_' . $this->kodeLpti;
			$field_tanggal_lpti = 'tanggal_' . $this->kodeLpti;
			$field_nomor_npi = 'nomor_' . $this->kodeNpi;
			$field_tanggal_npi = 'tanggal_' . $this->kodeNpi;
			$field_flag_rekom_nhi = 'flag_rekom_' . $this->kodeNhi;
			$field_flag_rekom_ni = 'flag_rekom_' . $this->kodeNi;

			$lkai = new $this->model;
			$lkai->no_dok = $this->currentNumber;
			$lkai->agenda_dok = $this->agendaDokumen;
			$lkai->thn_dok = $this->year;
			$lkai->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$lkai->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$lkai->chain_id = $lppi['chain']->id;
			$lkai->$field_nomor_lpti = $lpti['nomor'];
			$lkai->$field_tanggal_lpti = $lpti['tanggal'];
			$lkai->$field_nomor_npi = $npi['nomor'];
			$lkai->$field_tanggal_npi = $npi['tanggal'];
			$lkai->informasi = $lppi['informasi'];
			$lkai->prosedur = $this->faker->text();
			$lkai->hasil = $this->faker->text();
			$lkai->kesimpulan = $this->faker->text();
			$lkai->$field_flag_rekom_nhi = $this->faker->boolean();
			$lkai->$field_flag_rekom_ni = $this->faker->boolean();
			$lkai->rekomendasi_lain = $rekomendasi;
			if ($this->docCode == 'lkai') {
				$lkai->informasi_lain = $informasi_lain;
			}
			$lkai->tujuan = $this->faker->text(30);
			$lkai->keputusan_pejabat = $this->faker->boolean();
			$lkai->catatan_pejabat = $this->faker->text();
			$lkai->tanggal_terima_pejabat = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$lkai->keputusan_atasan = $this->faker->boolean();
			$lkai->catatan_atasan = $this->faker->text();
			$lkai->tanggal_terima_atasan = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$lkai->kode_status = 'terbit';
			$lkai->created_by = $creator;
			$lkai->updated_by = $creator;
			$lkai->saveQuietly();

			// Petugas
			$this->createPetugas($lkai, 'analis');
			$this->createPejabat($lkai, 'pejabat', 'bd.0501', '147');
			$this->createPejabat($lkai, 'atasan', 'bd.05', '555');

			// Update chain
			$lppi['chain']->update(['latest_document' => $lkai->kodeDokumen]);
		}

		$this->createPenomoran();
	}

	/**
	 * Randomize LPTI flag,
	 * if using LPTI generate new LPTI
	 * else return null data
	 */
	protected function generateLpti() {
		$lpti = ['nomor' => null, 'tanggal' => null];

		$flag_lpti = $this->faker->boolean();
		if ($flag_lpti) {
			$lpti['nomor'] = $this->tipeLpti . '-' . $this->crnLpti . '/KPU.305/' . $this->year;
			$lpti['tanggal'] = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$this->crnLpti += 1;
		}

		return $lpti;
	}

	/**
	 * Randomize NPI flag,
	 * if using NPI generate new NPI
	 * else return null data
	 */
	protected function generateNpi() {
		$npi = ['nomor' => null, 'tanggal' => null];

		$flag_npi = $this->faker->boolean();
		if ($flag_npi) {
			$npi['nomor'] = $this->tipeNpi . '-' . $this->crnNpi . '/KPU.305/' . $this->year;
			$npi['tanggal'] = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$this->crnNpi += 1;
		}

		return $npi;
	}

	/**
	 * Randomize LPPI flag,
	 * if using LPPI choose from existing LPPI
	 * else create new document chain
	 */
	protected function generateLppi() {
		$with_lppi = $this->faker->boolean();
		if ($with_lppi) {
			// Get data LPPI
			$lppi = $this->chooseDocSource($this->kodeLppi, $this->available_lppi_id);
			$this->available_lppi_id = array_diff($this->available_lppi_id, [$lppi->id]);
			$chain = $lppi->chain;

			// Ikhtisar informasi
			$informasi = $lppi->informasi()->get()->toArray();
			$informasi = array_map(function ($info) {
				return $info['informasi'];
			}, $informasi);
			$informasi = implode(PHP_EOL, $informasi);
		} else {
			// Create document chain
			$chain = DocumentsChain::create();

			// Ikhtisar informasi
			$informasi = $this->faker->text();
		}

		return array('chain' => $chain, 'informasi' => $informasi);
	}
}
