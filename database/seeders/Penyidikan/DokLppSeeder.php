<?php

namespace Database\Seeders\Penyidikan;

use App\Models\Penyidikan\Penyidikan;
use App\Models\Penyidikan\PenyidikanBhp;
use App\Models\References\RefKategoriPelanggaran;
use Database\Seeders\DokSeeder;

class DokLppSeeder extends DokSeeder
{
	protected $docCode = 'lpp';

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$list_jenis_penindakan = [
			'penghentian sarana pengangkut',
			'pemeriksaan barang',
			'penyegelan',
			'penegahan',
			'penangkapan',
		];

		// References
		$list_kategori_pelanggaran = RefKategoriPelanggaran::select('id')->get();

		/**
		 * Source
		 */
		$this->available_source_id = [];
		foreach (['lp', 'lpn'] as $jenis) {
			$this->available_source_id[$jenis] = $this->getAvailableDocIds($jenis);
		}

		for ($i=1; $i < 26; $i++) {
			// New Number
			$this->currentNumber = $this->getNewNumber();

			// Get source data
			$this->chain = $this->chooseSource();

			// Create penyidikan
			$this->createPenyidikan();

			// Create LPP
			$creator = $this->choosePelaksana();

			$lpp = new $this->model;
			$lpp->no_dok = $this->currentNumber;
			$lpp->agenda_dok = $this->agendaDokumen;
			$lpp->thn_dok = $this->year;
			$lpp->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$lpp->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$lpp->chain_id = $this->chain->id;
			$lpp->asal_perkara = $this->faker->sentence(5);
			$lpp->jenis_penindakan = $this->faker->randomElement($list_jenis_penindakan);
			$lpp->jenis_perkara_id = $this->faker->randomElement($list_kategori_pelanggaran)->id;
			$lpp->catatan = $this->faker->sentence(20);
			$lpp->kode_status = 'terbit';
			$lpp->created_by = $creator;
			$lpp->updated_by = $creator;
			$lpp->saveQuietly();

			// Petugas
			$this->createPetugas($lpp, 'penyusun');
			$this->createPejabat($lpp, 'atasan1', 'bd.0505', '156748');
			$this->createPejabat($lpp, 'atasan2', 'bd.05', '555');

			// Update Chain
			$this->chain->update(['latest_document' => $lpp->kodeDokumen]);
		}

		$this->createPenomoran();
	}

	protected function chooseSource()
	{
		$sourceType = $this->faker->randomElement(['lp', 'lpn']);
		$source = $this->chooseDocSource($sourceType, $this->available_source_id[$sourceType]);
		$this->available_source_id[$sourceType] = array_diff($this->available_source_id[$sourceType], [$source->id]);
		return $source->chain;
	}

	protected function createPenyidikan()
	{
		$pasal = $this->faker->numberBetween(1, 100);
		$ayat = $this->faker->numberBetween(1, 10);
		$penindakan = $this->chain->penindakan;

		// Create penyidikan
		$penyidikan = Penyidikan::create([
			'chain_id' => $this->chain->id,
			'jenis_pelanggaran' => $this->faker->sentence(20),
			'pasal' => 'pasal ' . $pasal . ' ayat (' . $ayat . ')',
			'tempat_pelanggaran' => $penindakan->lokasi_penindakan,
			'tanggal_pelanggaran' => $penindakan->tanggal_selesai_penindakan,
			'waktu_pelanggaran' => $penindakan->waktu_selesai_penindakan,
			'modus' => $this->faker->sentence(40),
			'pelaku_id' => $penindakan->saksi_id,
			'tertangkap_tangan' => $this->faker->boolean(),
		]);

		// Create BHP
		$barang = $penindakan->barang;
		$sarkut = $penindakan->sarkut;

		$bhp = new PenyidikanBhp();
		$bhp->penyidikan_id = $penyidikan->id;
		$bhp->jumlah_kemasan = $barang ? $barang->jumlah_kemasan : null;
		$bhp->jenis_kemasan_id = $barang ? $barang->jenis_kemasan_id : null;
		$bhp->nomor_kemasan = $barang ? $barang->nomor_kemasan : null;
		$bhp->jenis_dokumen = $barang ? $barang->jenis_dokumen : null;
		$bhp->nomor_dokumen = $barang ? $barang->nomor_dokumen : null;
		$bhp->tanggal_dokumen = $barang ? $barang->tanggal_dokumen : null;
		$bhp->nama_sarkut = $sarkut ? $sarkut->nama_sarkut : null;
		$bhp->jenis_sarkut = $sarkut ? $sarkut->jenis_sarkut : null;
		$bhp->nomor_sarkut = $sarkut ? $sarkut->nomor_sarkut : null;
		$bhp->registrasi_sarkut = $sarkut ? $sarkut->registrasi_sarkut : null;
		$bhp->nomor_kontainer = $sarkut ? $sarkut->nomor_kontainer : null;
		$bhp->ukuran_kontainer = $sarkut ? $sarkut->ukuran_kontainer : null;
		$bhp->save();

		if ($barang) {
			$item_barang = $barang->barang->toArray();
			foreach ($item_barang as $item) {
				unset($item['id']);
				$bhp->barang()->create($item);
			}
		}
	}
}
