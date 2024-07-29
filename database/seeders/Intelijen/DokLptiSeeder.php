<?php

namespace Database\Seeders\Intelijen;

use Database\Seeders\DokSeeder;

class DokLptiSeeder extends DokSeeder
{
    protected $docCode = 'lpti';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get available STI ids
        $this->available_sti_id = $this->getAvailableDocIds('sti');

        for ($d=0; $d < 21; $d++) {
            // New Number
            $this->currentNumber = $this->getNewNumber();

            // Chain from STI
            $chain = $this->chooseSti();

            // Create LPTI header data
            $creator = $this->choosePelaksana();

            $lpti = new $this->model;
            $lpti->no_dok = $this->currentNumber;
            $lpti->agenda_dok = $this->agendaDokumen;
            $lpti->thn_dok = $this->year;
            $lpti->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
            $lpti->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lpti->chain_id = $chain->id;
            $lpti->tempat_pengumpulan = $this->faker->address();
            $lpti->sumber_informasi = $this->faker->sentence(5);
            $lpti->metode_pengumpulan = $this->faker->sentence(5);
            $lpti->ikhtisar_informasi = $this->faker->sentence(30);
            $lpti->jenis_dok_pabean = $this->faker->regexify('[A-Z]{3}');
            $lpti->nomor_dok_pabean = $this->faker->regexify('[0-9]{6}');
            $lpti->tanggal_dok_pabean = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lpti->metode_analisis = $this->faker->sentence(5);
            $lpti->ikhtisar_analisis = $this->faker->sentence(30);
            $lpti->jenis_pelanggaran = $this->faker->randomElement(['Kepabeanan', 'Cukai']);
            $lpti->modus_pelanggaran = $this->faker->sentence(40);
            $lpti->tempat_pelanggaran = $this->faker->address();
            $lpti->waktu_pelanggaran = $this->faker->dateTimeThisYear()->format('Y-m-d');
            $lpti->dokumentasi_foto = $this->faker->sentence(10);
            $lpti->dokumentasi_audio = $this->faker->sentence(10);
            $lpti->dokumentasi_video = $this->faker->sentence(10);
            $lpti->informasi_lain = $this->faker->sentence(50);
            $lpti->kesimpulan = $this->faker->sentence(50);
            $lpti->rekomendasi = $this->faker->sentence(50);
            $lpti->kode_status = 'terbit';
            $lpti->created_by = $creator;
            $lpti->updated_by = $creator;
            $lpti->saveQuietly();

            $this->createEntity($lpti, 'pelaku');

            // Petugas
            $this->createPetugas($lpti, 'pembuat');

            // Create tembusan
            $this->createTembusan($lpti);

            // Update Chain
            $chain->update(['latest_document' => $lpti->kodeDokumen]);
        }

        $this->createPenomoran();
    }

    protected function chooseSti()
    {
        $sti = $this->chooseDocSource('sti', $this->available_sti_id);
        $this->available_sti_id = array_diff($this->available_sti_id, [$sti->id]);
        return $sti->chain;
    }

}
