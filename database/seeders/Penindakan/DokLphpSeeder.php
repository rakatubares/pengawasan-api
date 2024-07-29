<?php

namespace Database\Seeders\Penindakan;

use Database\Seeders\DokSeeder;

class DokLphpSeeder extends DokSeeder
{
    protected $docCode = 'lphp';

    public function __construct()
    {
        parent::__construct();
        $this->kodeLptp = $this->doc->kodeLptp;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get available LPTP ids
        $this->available_lptp_id = $this->getAvailableDocIds($this->kodeLptp);

        for ($i=1; $i < 31; $i++) {
            // New Number
            $this->currentNumber = $this->getNewNumber();

            // Chain from LPTP
            $chain = $this->chooseLptp();

            // Create LPHP
            $creator = $this->choosePelaksana();

            $lphp = new $this->model;
            $lphp->no_dok = $this->currentNumber;
            $lphp->agenda_dok = $this->agendaDokumen;
            $lphp->thn_dok = $this->year;
            $lphp->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $lphp->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lphp->chain_id = $chain->id;
            $lphp->analisa = $this->faker->sentence(20);
            $lphp->catatan = $this->faker->sentence(20);
            $lphp->kode_status = 'terbit';
            $lphp->created_by = $creator;
            $lphp->updated_by = $creator;
            $lphp->saveQuietly();

            // Petugas
            $this->createPejabat($lphp, 'penyusun', 'bd.0503', '111');
            $this->createPejabat($lphp, 'atasan', 'bd.05', '555');

            // Update Chain
            $chain->update(['latest_document' => $lphp->kodeDokumen]);
        }

        $this->createPenomoran();
    }

    protected function chooseLptp()
    {
        $lptp = $this->chooseDocSource($this->kodeLptp, $this->available_lptp_id);
        $this->available_lptp_id = array_diff($this->available_lptp_id, [$lptp->id]);
        return $lptp->chain;
    }
}
