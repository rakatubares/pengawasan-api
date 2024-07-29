<?php

namespace Database\Seeders\Intelijen;

use Database\Seeders\DokSeeder;

class DokNiSeeder extends DokSeeder
{
    protected $docCode = 'ni';

    public function __construct()
    {
        parent::__construct();
        $this->kodeLkai = $this->doc->kodeLkai;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get LKAI ids
        $this->available_lkai_id = $this->getAvailableDocIds($this->kodeLkai);

        for ($d=1; $d < 11; $d++) {
            // New Number
            $this->currentNumber = $this->getNewNumber();

            // Chain from LKAI
            $chain = $this->chooseLkai();

            // Create NI data
            $creator = $this->choosePelaksana();

            $ni = new $this->model;
            $ni->no_dok = $this->currentNumber;
            $ni->agenda_dok = $this->agendaDokumen;
            $ni->thn_dok = $this->year;
            $ni->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $ni->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $ni->chain_id = $chain->id;
            $ni->sifat = $this->faker->randomElement(['segera', 'sangat segera']);
            $ni->klasifikasi = $this->faker->randomElement(['rahasia', 'sangat rahasia']);
            $ni->tujuan = $this->faker->randomElement(['Kepala Seksi Patroli dan Operasi I', 'Kepala Seksi Patroli dan Operasi II']);
            $ni->uraian = $this->createUraian();
            $ni->kode_status = 'terbit';
            $ni->created_by = $creator;
            $ni->updated_by = $creator;
            $ni->saveQuietly();

            // Petugas
            $this->createPejabat($ni, 'penerbit', 'bd.05', '555');

            //  Document chain
            $chain->update(['latest_document' => $ni->kodeDokumen]);

            // Create tembusan
            $this->createTembusan($ni);
        }

        $this->createPenomoran();
    }

    protected function chooseLkai()
    {
        $lkai = $this->chooseDocSource($this->kodeLkai, $this->available_lkai_id);
        $this->available_lkai_id = array_diff($this->available_lkai_id, [$lkai->id]);
        return $lkai->chain;
    }

    // Create random uraian length
    private function createUraian()
    {
        $par_count = rand(1, 3);
        $paragraphs = [];
        for ($c=0; $c < $par_count; $c++) {
            $par_length = $this->faker->randomElement([100, 200, 300, 400, 500]);
            $par = $this->faker->text($par_length);
            $paragraphs[] = $par;
        }
        return implode(PHP_EOL.PHP_EOL , $paragraphs);
    }
}
