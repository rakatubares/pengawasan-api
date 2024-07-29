<?php

namespace Database\Seeders\Penyidikan;

use Database\Seeders\DokSeeder;

class DokLpfSeeder extends DokSeeder
{
    protected $docCode = 'lpf';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get available LPP ids
        $this->available_lpp_id = $this->getAvailableDocIds('lpp');

        for ($i=1; $i < 21; $i++) {
            // New Number
            $this->currentNumber = $this->getNewNumber();

            // Chain from LPP
            $chain = $this->chooseLpp();
            
            // Create LPF
            $creator = $this->choosePelaksana();

            $lpf = new $this->model;
            $lpf->no_dok = $this->currentNumber;
            $lpf->agenda_dok = $this->agendaDokumen;
            $lpf->thn_dok = $this->year;
            $lpf->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $lpf->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lpf->chain_id = $chain->id;
            $lpf->saksi_id = $this->faker->numberBetween(1,100);
            $lpf->tanggal_bap_saksi = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lpf->tersangka_id = $chain->penyidikan->pelaku_id;
            $lpf->tanggal_bap_tersangka = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lpf->resume_perkara = $this->faker->regexify('[A-Z0-9]{5,10}');
            $lpf->tanggal_resume_perkara = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lpf->jenis_dokumen_lain = $this->faker->regexify('[A-Z]{3,5}');
            $lpf->nomor_dokumen_lain = $this->faker->regexify('[A-Z0-9]{5,10}');
            $lpf->tanggal_dokumen_lain = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lpf->kesimpulan = $this->faker->sentence(20);
            $lpf->usulan = $this->faker->text();
            $lpf->catatan = $this->faker->sentence(20);
            $lpf->kode_status = 'terbit';
            $lpf->created_by = $creator;
            $lpf->updated_by = $creator;
            $lpf->saveQuietly();

            // Petugas
            $this->createPetugas($lpf, 'peneliti');
            $this->createPejabat($lpf, 'atasan1', 'bd.0505', '156748');
            $this->createPejabat($lpf, 'atasan2', 'bd.05', '555');

            // Update Chain
            $chain->update(['latest_document' => $lpf->kodeDokumen]);
        }

        $this->createPenomoran();
    }

    protected function chooseLpp()
    {
        $lpp = $this->chooseDocSource('lpp', $this->available_lpp_id);
        $this->available_lpp_id = array_diff($this->available_lpp_id, [$lpp->id]);
        return $lpp->chain;
    }
}
