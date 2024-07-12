<?php

namespace Database\Seeders\Intelijen;

use App\Models\Intelijen\DokNhiBkc;
use App\Models\Intelijen\DokNhiExim;
use App\Models\Intelijen\DokNhiTertentu;
use App\Models\References\RefLokasi;
use App\Traits\BarangTrait;
use Database\Seeders\DokSeeder;

class DokNhiSeeder extends DokSeeder
{
	use BarangTrait;

	protected $docCode = 'nhi';

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

		// Get locations reference
		$lokasi = RefLokasi::select('lokasi')->get();

		for ($d=1; $d < 21; $d++) {
			// New Number
			$this->currentNumber = $this->getNewNumber();

			// Chain from LKAI
			$chain = $this->chooseLkai();

			// Create NHI header data
			$creator = $this->choosePelaksana();

			$nhi = new $this->model;
			$nhi->no_dok = $this->currentNumber;
			$nhi->agenda_dok = $this->agendaDokumen;
			$nhi->thn_dok = $this->year;
			$nhi->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$nhi->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$nhi->chain_id = $chain->id;
			$nhi->sifat = $this->faker->randomElement(['segera', 'sangat segera']);
			$nhi->klasifikasi = $this->faker->randomElement(['rahasia', 'sangat rahasia']);
			$nhi->tujuan = $this->faker->randomElement(['Kepala Seksi Patroli dan Operasi I', 'Kepala Seksi Patroli dan Operasi II']);
			$nhi->tempat_indikasi = $this->faker->randomElement($lokasi)->lokasi;
			$nhi->tanggal_indikasi = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$nhi->waktu_indikasi = $this->faker->time();
			$nhi->zona_waktu = 'WIB';
			$nhi->kode_kantor = '050100';
			$nhi->indikasi = $this->faker->text();
			$nhi->kode_status = 'terbit';
			$nhi->created_by = $creator;
			$nhi->updated_by = $creator;
			$nhi->saveQuietly();

			// Create kegiatan data
			$kegiatan = $this->faker->randomElement(['exim', 'bkc', 'tertentu']);
			if ($kegiatan == 'exim') {
				$detail_nhi = $this->createExim();
			} elseif ($kegiatan == 'bkc') {
				$detail_nhi = $this->createBkc();
			} elseif ($kegiatan == 'tertentu') {
				$detail_nhi = $this->createTertentu();
			}
			$nhi->detail()->associate($detail_nhi)->save();
			
			// Petugas
			$this->createPejabat($nhi, 'penerbit', 'bd.05', '555');

			// Create barang
			$this->seedBarang($nhi);

			// Create tembusan
			$this->createTembusan($nhi);

			// Document chain
			$chain->update(['latest_document' => $nhi->kodeDokumen]);
		}

		$this->createPenomoran();
	}

	protected function chooseLkai()
	{
		$lkai = $this->chooseDocSource($this->kodeLkai, $this->available_lkai_id);
		$this->available_lkai_id = array_diff($this->available_lkai_id, [$lkai->id]);
		return $lkai->chain;
	}

	protected function createExim()
	{
		$detail_nhi = DokNhiExim::create([
			'tipe' => $this->faker->randomElement(['Impor', 'Ekspor', 'PJT', 'Penumpang']),
			'jenis_dok' => $this->faker->randomElement(['PIB', 'PEB', 'AWB']),
			'nomor_dok' => $this->faker->numberBetween(1, 999999),
			'tanggal_dok' => $this->faker->date(),
			'nama_sarkut' => $this->faker->company(),
			'nomor_sarkut' => $this->faker->regexify($this->reNoSarkut),
			'nomor_awb' => $this->faker->regexify($this->reNoAwb),
			'tanggal_awb' => $this->faker->date(),
			'merek_koli' => $this->faker->regexify($this->reMerkKoli),
			'data_lain' => $this->faker->text(),
		]);
		$this->createEntity($detail_nhi);

		return $detail_nhi;
	}

	protected function createBkc()
	{
		return DokNhiBkc::create([
			'tempat_penimbunan' => $this->faker->address(),
			'penyalur' => $this->faker->company(),
			'tempat_penjualan' => $this->faker->address(),
			'nppbkc' => $this->faker->regexify('[0-9]{15}'),
			'nama_sarkut' => $this->faker->company(),
			'nomor_sarkut' => $this->faker->regexify($this->reNoSarkut),
			'data_lain' => $this->faker->text(),
		]);
	}

	protected function createTertentu()
	{
		$detail_nhi = DokNhiTertentu::create([
			'jenis_dok' => $this->faker->randomElement(['PIB', 'PEB']),
			'nomor_dok' => $this->faker->numberBetween(1, 999999),
			'tanggal_dok' => $this->faker->date(),
			'nama_sarkut' => $this->faker->company(),
			'nomor_sarkut' => $this->faker->regexify($this->reNoSarkut),
			'nomor_awb' => $this->faker->regexify($this->reNoAwb),
			'tanggal_awb' => $this->faker->date(),
			'merek_koli' => $this->faker->regexify($this->reMerkKoli),
			'data_lain' => $this->faker->text(),
		]);
		$this->createEntity($detail_nhi);

		return $detail_nhi;
	}
}
