<?php

namespace Database\Seeders\Penindakan;

use Database\Seeders\DokSeeder;

class DokLpNSeeder extends DokSeeder
{
	protected $docCode = 'lpn';

	public function __construct()
	{
		parent::__construct();
		$this->kodeLphp = $this->doc->kodeLphp;
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Get available LPHP-N ids
		$this->available_lphpn_id = $this->getAvailableDocIds($this->kodeLphp);

		for ($i=1; $i < 21; $i++) {
			// New Number
			$this->currentNumber = $this->getNewNumber();

			// Chain from LPHP-N
			$chain = $this->chooseLphpN();

			// Create LP-N
			$creator = $this->choosePelaksana();

			$lpn = new $this->model;
			$lpn->no_dok = $this->currentNumber;
			$lpn->agenda_dok = $this->agendaDokumen;
			$lpn->thn_dok = $this->year;
			$lpn->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$lpn->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$lpn->chain_id = $chain->id;
			$lpn->sprint_id = $this->faker->numberBetween(1,10);
			$lpn->kesimpulan = $this->faker->sentence(20);
			$lpn->kode_status = 'terbit';
			$lpn->created_by = $creator;
			$lpn->updated_by = $creator;
			$lpn->saveQuietly();

			// Petugas
			$this->createPejabat($lpn, 'penyusun', 'bd.0502', '258');
			$this->createPejabat($lpn, 'penerbit', 'bd.05', '555');

			// Update Chain
			$chain->update(['latest_document' => $lpn->kodeDokumen]);
		}

		$this->createPenomoran();
	}

	protected function chooseLphpN()
	{
		$lphpn = $this->chooseDocSource($this->kodeLphp, $this->available_lphpn_id);
		$this->available_lphpn_id = array_diff($this->available_lphpn_id, [$lphpn->id]);
		return $lphpn->chain;
	}
}
