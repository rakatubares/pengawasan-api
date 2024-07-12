<?php

namespace Database\Seeders\Intelijen;

use App\Models\Intelijen\DokNhiN;
use App\Models\Intelijen\DokNhiNExim;
use App\Models\Intelijen\DokNhiNOrang;
use App\Models\Intelijen\DokNhiNSarkut;
use App\Models\References\RefBandara;
use App\Models\References\RefLokasi;
use App\Traits\BarangTrait;
use Database\Seeders\DokSeeder;

class DokNhiNSeeder extends DokSeeder
{
	use BarangTrait;

	protected $docCode = 'nhin';

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

		// Get airport codes
		$airports = RefBandara::select('iata_code')->where('iata_code', '!=', 'CGK')->get()->all();
		$this->airports_code = array_map(function($d) {return $d['iata_code'];}, $airports);

		for ($d=1; $d < 21; $d++) {
			// New Number
			$this->currentNumber = $this->getNewNumber();

			// Chain from LKAI-N
			$chain = $this->chooseLkaiN();

			// Create NHI-N header data
			$creator = $this->choosePelaksana();

			$nhin = new DokNhiN();
			$nhin->no_dok = $this->currentNumber;
			$nhin->agenda_dok = $this->agendaDokumen;
			$nhin->thn_dok = $this->year;
			$nhin->no_dok_lengkap = "{$this->tipeDokumen}-{$this->currentNumber}{$this->agendaDokumen}{$this->year}";
			$nhin->tanggal_dokumen = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$nhin->chain_id = $chain->id;
			$nhin->sifat = $this->faker->randomElement(['segera', 'sangat segera']);
			$nhin->klasifikasi = $this->faker->randomElement(['rahasia', 'sangat rahasia']);
			$nhin->tujuan = $this->faker->randomElement(['Kepala Seksi Patroli dan Operasi I', 'Kepala Seksi Patroli dan Operasi II']);
			$nhin->tempat_indikasi = $this->faker->randomElement($lokasi)->lokasi;
			$nhin->tanggal_indikasi = $this->faker->dateTimeThisYear()->format('Y-m-d');
			$nhin->waktu_indikasi = $this->faker->time();
			$nhin->zona_waktu = 'WIB';
			$nhin->kode_kantor = '050100';
			$nhin->indikasi = $this->faker->text();
			$nhin->kode_status = 'terbit';
			$nhin->created_by = $creator;
			$nhin->updated_by = $creator;
			$nhin->saveQuietly();

			// Create kegiatan data
			$kegiatan = $this->faker->randomElement(['exim', 'sarkut', 'orang']);
			if ($kegiatan == 'exim') {
				$detail_nhin = $this->createExim($nhin);
			} elseif ($kegiatan == 'sarkut') {
				$detail_nhin = $this->createSarkut();
			} elseif ($kegiatan == 'orang') {
				$detail_nhin = $this->createOrang();
			}

			$nhin->detail()->associate($detail_nhin)->save();

			// Petugas
			$this->createPejabat($nhin, 'penerbit', 'bd.05', '555');

			// Document chain
			$chain->update(['latest_document' => $nhin->kodeDokumen]);

			// Create tembusan
			$this->createTembusan($nhin);
		}

		$this->createPenomoran();
    }

	protected function chooseLkaiN()
	{
		$lkain = $this->chooseDocSource($this->kodeLkai, $this->available_lkai_id);
		$this->available_lkai_id = array_diff($this->available_lkai_id, [$lkain->id]);
		return $lkain->chain;
	}

	protected function createExim($nhin)
	{
		$detail_nhin = DokNhiNExim::create([
			'tipe' => $this->faker->randomElement(['Impor', 'Ekspor', 'PJT', 'Penumpang']),
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
		$this->createEntity($detail_nhin);

		// Create barang
		$this->seedBarang($nhin);

		return $detail_nhin;
	}

	protected function createSarkut()
	{
		return DokNhiNSarkut::create([
			'nama_sarkut' => $this->faker->company(),
			'jenis_sarkut' => 'Pesawat',
			'nomor_sarkut' => $this->faker->regexify('[A-Z]{2}[0-9]{3}'),
			'kode_pelabuhan_asal' => $this->faker->randomElement($this->airports_code),
			'kode_pelabuhan_tujuan' => 'CGK',
			'imo_mmsi' => $this->faker->regexify('[A-Z]{2}-[0-9]{3}'),
			'data_lain' => $this->faker->text(),
		]);
	}

	protected function createOrang()
	{
		return DokNhiNOrang::create([
			'entitas_id' => $this->faker->numberBetween(1, 100),
			'nomor_sarkut' => $this->faker->regexify('[A-Z]{2}[0-9]{3}'),
			'kode_pelabuhan_asal' => $this->faker->randomElement($this->airports_code),
			'kode_pelabuhan_tujuan' => 'CGK',
			'tanggal_berangkat' => $this->faker->date(),
			'waktu_berangkat' => $this->faker->time(),
			'tanggal_datang' => $this->faker->date(),
			'waktu_datang' => $this->faker->time(),
			'data_lain' => $this->faker->text()
		]);
	}
}
