<?php

namespace Database\Seeders\Intelijen;

use App\Models\DocumentsChain;
use Database\Seeders\DokSeeder;

class DokStiSeeder extends DokSeeder
{
	protected $docCode = 'sti';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($d=1; $d < 51; $d++) {
			// New Number
			$this->currentNumber = $this->getNewNumber();

			// Create document chain
			$chain = DocumentsChain::create();

			// Insert data
			$creator = $this->choosePelaksana();

			$sti = new $this->model;
			$sti->no_dok = $this->currentNumber;
			$sti->agenda_dok = $this->agendaDokumen;
			$sti->thn_dok = $this->year;
			$sti->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$sti->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$sti->chain_id = $chain->id;
			$sti->wilayah = $this->faker->address();
			$sti->tanggal_mulai = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$sti->tanggal_akhir = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$sti->sifat = $this->faker->randomElement(['tertutup', 'terbuka']);
			$sti->pakaian = $this->faker->randomElement(['PDH', 'non-PDH']);
			$sti->kode_status = 'terbit';
			$sti->created_by = $creator;
			$sti->updated_by = $creator;
			$sti->saveQuietly();

			// Tugas
			$tugasCount = rand(1,3);
			for ($i=1; $i <= $tugasCount ; $i++) {
				$sti->tugas()->create([
					'tugas' => $this->faker->text(50)
				]);
			}

			// Pengendali Operasi
			$this->createPejabat($sti, 'pengendali', 'bd.0501', '147');

			// Tim Operasi
			$availableNip = $this->nipPelaksana;
			$officerCount = rand(1,2);
			for ($x = 1; $x <= $officerCount; $x++) {
				// Choose CC
				$nip = $this->createPetugas($sti, 'tim', $availableNip);
				$availableNip = array_diff($availableNip, [$nip]);
			}

			// Penerbit
			$this->createPejabat($sti, 'penerbit', 'bd.05', '555');

			// Create tembusan
			$this->createTembusan($sti);

			// Update Chain
			$chain->update(['latest_document' => $sti->kodeDokumen]);
		}

		$this->createPenomoran();
    }
}
