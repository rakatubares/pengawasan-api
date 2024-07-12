<?php

namespace Database\Seeders\Penindakan;

use Database\Seeders\DokSeeder;
use Illuminate\Database\Eloquent\Relations\Relation;

class DokLptSeeder extends DokSeeder
{
	protected $docCode = 'lpt';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Get sbp ids
		$model_sbp = Relation::getMorphedModel('sbp');
		$max_sbp_id = $model_sbp::max('id');
		$this->available_sbp_id = range(1, $max_sbp_id);

		for ($i=1; $i < 16; $i++) {
			// New Number
			$this->currentNumber = $this->getNewNumber();

			// Chain from SBP
			$chain = $this->chooseSbp();

			// Create LPT
			$creator = $this->choosePelaksana();

			$lpt = new $this->model;
			$lpt->no_dok = $this->currentNumber;
			$lpt->agenda_dok = $this->agendaDokumen;
			$lpt->thn_dok = $this->year;
			$lpt->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$lpt->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$lpt->chain_id = $chain->id;
			$lpt->barang = $this->faker->sentence(5);
			$lpt->sarpras = $this->faker->sentence(10);
			$lpt->kronologi = $this->faker->sentence(30);
			$lpt->kode_status = 'terbit';
			$lpt->created_by = $creator;
			$lpt->updated_by = $creator;
			$lpt->saveQuietly();

			// Petugas
			$this->createPejabat($lpt, 'pejabat', 'bd.0503', '111');
		}

		$this->createPenomoran();
    }

	protected function chooseSbp()
	{
		$sbp = $this->chooseDocSource('sbp', $this->available_sbp_id, 'status_lpt');
		$this->available_sbp_id = array_diff($this->available_sbp_id, [$sbp->id]);
		return $sbp->chain;
	}
}
