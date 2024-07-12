<?php

namespace Database\Seeders\Penindakan;

use App\Models\DocumentsChain;
use App\Models\Penindakan\Penindakan;
use Database\Seeders\DokSeeder;

class DokBukaPengamanSeeder extends DokSeeder
{
	use ObjekPenindakanSeederTrait;

	protected $docCode = 'buka_pengaman';

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Get available BA Tanda Pengaman ids
		$this->available_pengaman_id = $this->getAvailableDocIds('pengaman');

		for ($i=1; $i < 11; $i++) {
			// New Number
			$this->currentNumber = $this->getNewNumber();

			// Create Buka pengaman
			$creator = $this->choosePelaksana();

			$buka_pengaman = new $this->model;
			$buka_pengaman->no_dok = $this->currentNumber;
			$buka_pengaman->agenda_dok = $this->agendaDokumen;
			$buka_pengaman->thn_dok = $this->year;
			$buka_pengaman->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$buka_pengaman->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$buka_pengaman->sprint_id = $this->faker->numberBetween(1,10);
			$buka_pengaman->tanggal_buka_pengaman = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$buka_pengaman->saksi_id = $this->faker->numberBetween(1,100);
			$buka_pengaman->kode_status = 'terbit';
			$buka_pengaman->created_by = $creator;
			$buka_pengaman->updated_by = $creator;

			$flag_pengaman = $this->faker->boolean();
			if ($flag_pengaman) {
				// Get data pengaman
				$pengaman = $this->choosePengaman();
				$chain = $pengaman->chain;

				// Set pengaman data
				$buka_pengaman->chain_id = $chain->id;
				$buka_pengaman->asal_pengaman = 'pengaman';
				$buka_pengaman->jenis_pengaman = $pengaman->jenis_pengaman;
				$buka_pengaman->jumlah_pengaman = $pengaman->jumlah_pengaman;
				$buka_pengaman->satuan_pengaman = $pengaman->satuan_pengaman;
				$buka_pengaman->tempat_pengaman = $pengaman->tempat_pengaman;
				$buka_pengaman->nomor_pengaman = $pengaman->nomor_pengaman;
				$buka_pengaman->tanggal_pengaman = $pengaman->chain->penindakan->tanggal_selesai_penindakan->format('Y-m-d');
			} else {
				// Create chain
				$chain = DocumentsChain::create();

				// Create penindakan
				$penindakan = new Penindakan();
				$penindakan->chain_id = $chain->id;
				$penindakan->save();

				// Set pengaman data
				$buka_pengaman->chain_id = $chain->id;
				$buka_pengaman->asal_pengaman = 'input';
				$buka_pengaman->jenis_pengaman = $this->faker->randomElement(['Kertas', 'Timah', 'Lainnya']);
				$buka_pengaman->jumlah_pengaman = $this->faker->numberBetween(1,5);
				$buka_pengaman->satuan_pengaman = $this->faker->randomElement(['lembar', 'buah']);
				$buka_pengaman->tempat_pengaman = $this->faker->word();
				$buka_pengaman->nomor_pengaman = 'BA-' . $this->faker->numberBetween(1,100) . '/Tanda Pengaman/BC/' . date("Y");
				$buka_pengaman->tanggal_pengaman = $this->faker->dateTimeThisYear()->format('Y-m-d');

				// Objek penindakan
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
			$buka_pengaman->saveQuietly();

			// Update chain status
			$chain->update(['latest_document' => $buka_pengaman->kodeDokumen]);

			// Petugas
			$availableNip = $this->nipPelaksana;
			$nip = $this->createPetugas($buka_pengaman, 'petugas1', $availableNip);

			$with_petugas2 = $this->faker->boolean();
			if ($with_petugas2) {
				$availableNip = array_diff($availableNip, [$nip]);
				$this->createPetugas($buka_pengaman, 'petugas2', $availableNip);
			}
		}

		$this->createPenomoran();
	}

	protected function choosePengaman()
	{
		$pengaman = $this->chooseDocSource('pengaman', $this->available_pengaman_id, 'status_buka');
		$this->available_pengaman_id = array_diff($this->available_pengaman_id, [$pengaman->id]);
		return $pengaman;
	}
}
