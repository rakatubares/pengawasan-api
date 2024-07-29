<?php

namespace Database\Seeders\Penindakan;

use Database\Seeders\DokSeeder;

class DokLpSeeder extends DokSeeder
{
    protected $docCode = 'lp';

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
        // Get available LPHP ids
        $this->available_lphp_id = $this->getAvailableDocIds($this->kodeLphp);

        for ($i=1; $i < 21; $i++) {
            // New Number
            $this->currentNumber = $this->getNewNumber();

            // Chain from LPHP
            $chain = $this->chooseLphp();

            // Create LP
            $creator = $this->choosePelaksana();

            $lp = new $this->model;
            $lp->no_dok = $this->currentNumber;
            $lp->agenda_dok = $this->agendaDokumen;
            $lp->thn_dok = $this->year;
            $lp->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $lp->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lp->chain_id = $chain->id;
            $lp->pasal = $this->faker->sentence(5);
            $lp->modus = $this->faker->sentence(20);
            $lp->kode_status = 'terbit';
            $lp->created_by = $creator;
            $lp->updated_by = $creator;
            $lp->saveQuietly();

            // Petugas
            $this->createPejabat($lp, 'pejabat', 'bd.0503', '111');

            // Update Chain
            $chain->update(['latest_document' => $lp->kodeDokumen]);
        }

        $this->createPenomoran();
    }

    protected function chooseLphp()
    {
        $lphp = $this->chooseDocSource($this->kodeLphp, $this->available_lphp_id);
        $this->available_lphp_id = array_diff($this->available_lphp_id, [$lphp->id]);
        return $lphp->chain;
    }
}
