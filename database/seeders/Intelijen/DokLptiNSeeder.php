<?php

namespace Database\Seeders\Intelijen;

use App\Models\DocumentsChain;
use Database\Seeders\DokSeeder;

class DokLptiNSeeder extends DokSeeder
{
    protected $docCode = 'lptin';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($d=0; $d < 21; $d++) {
            // New Number
            $this->currentNumber = $this->getNewNumber();

            // Create document chain
            $chain = DocumentsChain::create();

            // Create LPTI header data
            $creator = $this->choosePelaksana();

            $lptin = new $this->model;
            $lptin->no_dok = $this->currentNumber;
            $lptin->agenda_dok = $this->agendaDokumen;
            $lptin->thn_dok = $this->year;
            $lptin->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $lptin->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lptin->chain_id = $chain->id;
            $lptin->nomor_st = 'ST-' . $d+1 . '/KPU.305/' . $this->year;
            $lptin->tanggal_st = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lptin->wilayah = $this->faker->address();
            $lptin->tanggal_mulai = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lptin->tanggal_akhir = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lptin->uraian = $this->faker->sentence(200);
            $lptin->kesimpulan = $this->faker->sentence(50);
            $lptin->rekomendasi = $this->faker->sentence(50);
            $lptin->kode_status = 'terbit';
            $lptin->created_by = $creator;
            $lptin->updated_by = $creator;
            $lptin->saveQuietly();

            // Tugas
            $tugasCount = rand(1,3);
            for ($i=1; $i <= $tugasCount ; $i++) {
                $lptin->tugas()->create([
                    'tugas' => $this->faker->text(50)
                ]);
            }

            // Petugas
            $this->createPetugas($lptin, 'pembuat');

            // Create tembusan
            $this->createTembusan($lptin);

            // Update Chain
            $chain->update(['latest_document' => $lptin->kodeDokumen]);
        }

        $this->createPenomoran();
    }
}
