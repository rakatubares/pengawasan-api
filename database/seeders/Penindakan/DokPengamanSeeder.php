<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use App\Models\Penindakan\Penindakan;
use App\Models\References\RefLokasi;
use Database\Seeders\DokSeeder;

class DokPengamanSeeder extends DokSeeder
{
	use ObjekPenindakanSeederTrait;

	protected $docCode = 'pengaman';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// References
		$this->lokasi = RefLokasi::select('lokasi')->get();

        for ($i=1; $i < 21; $i++) {
			// New Number
			$this->currentNumber = $this->getNewNumber();

			// Create chain
			$this->chain = DocumentsChain::create();

			// Create penindakan
			$this->createPenindakan();

			// Create BA Pengaman
			$creator = $this->choosePelaksana();

			$pengaman = new $this->model;
			$pengaman->no_dok = $this->currentNumber;
			$pengaman->agenda_dok = $this->agendaDokumen;
			$pengaman->thn_dok = $this->year;
			$pengaman->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$pengaman->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$pengaman->chain_id = $this->chain->id;
			$pengaman->alasan_pengamanan =  $this->faker->sentence(20);
			$pengaman->keterangan =  $this->faker->sentence(20);
			$pengaman->jenis_pengaman =  $this->faker->randomElement(['Kertas', 'Timah', 'Gembok']);
			$pengaman->jumlah_pengaman =  $this->faker->numberBetween(1,5);
			$pengaman->satuan_pengaman =  $this->faker->randomElement(['lembar', 'buah']);
			$pengaman->nomor_pengaman = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$pengaman->tempat_pengaman =  $this->faker->word();
			$pengaman->kode_status = 'terbit';
			$pengaman->created_by = $creator;
			$pengaman->updated_by = $creator;
			$pengaman->saveQuietly();

			// Documents chain
			$this->chain->update(['latest_document' => $pengaman->kodeDokumen]);
		}

		$this->createPenomoran();
    }

	protected function createPenindakan()
	{
		// Create penindakan
		$penindakan = new Penindakan();
		$penindakan->sprint_id = $this->faker->numberBetween(1,10);
		$penindakan->chain_id = $this->chain->id;
		$penindakan->tanggal_selesai_penindakan = $this->faker->dateTimeThisYear()->format('Y-m-d');
		$penindakan->lokasi_penindakan = $this->faker->randomElement($this->lokasi)->lokasi;
		$penindakan->saksi_id = $this->faker->numberBetween(1,100);
		$penindakan->save();

		// Petugas
		$availableNip = $this->nipPelaksana;
		$nip = $this->createPetugas($penindakan, 'petugas1', $availableNip);

		$withPetugas2 = $this->faker->boolean();
		if ($withPetugas2) {
			$availableNip = array_diff($availableNip, [$nip]);
			$this->createPetugas($penindakan, 'petugas2', $availableNip);
		}

		// Sarkut
		$withSarkut = $this->faker->boolean();
		if ($withSarkut) {
			$this->createSarkut($penindakan);
		}

		// Barang
		$withBarang = $this->faker->boolean();
		if ($withBarang) {
			$this->createBarang($penindakan);
		}
	}
}
