<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use Database\Seeders\DokSeeder;

class DokLiSeeder extends DokSeeder
{
    protected $docCode = 'li';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 21; $i++) {
            // New Number
            $this->currentNumber = $this->getNewNumber();

            // Create document chain
            $chain = DocumentsChain::create();

            // Create LI
            $creator = $this->choosePelaksana();

            $li = new $this->model;
            $li->no_dok = $this->currentNumber;
            $li->agenda_dok = $this->agendaDokumen;
            $li->thn_dok = $this->year;
            $li->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $li->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $li->chain_id = $chain->id;
            $li->sumber = $this->faker->sentence(10);
            $li->informasi = $this->faker->sentence(40);
            $li->tindak_lanjut = $this->faker->sentence(20);
            $li->catatan = $this->faker->sentence(20);
            $li->kode_status = 'terbit';
            $li->created_by = $creator;
            $li->updated_by = $creator;
            $li->saveQuietly();

            // Petugas
            $this->createPejabat($li, 'penerbit', 'bd.0503', '111');
            $this->createPejabat($li, 'atasan', 'bd.05', '555');

            // Documents chain
            $chain->update(['latest_document' => $li->kodeDokumen]);
        }

        $this->createPenomoran();
    }
}
