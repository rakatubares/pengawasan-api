<?php

namespace Database\Seeders;

use App\Http\Controllers\SbpController;
use App\Models\DetailBarang;
use App\Models\DocRelation;
use App\Models\Sbp;
use App\Models\Segel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SbpSeeder extends Seeder
{
	public function __construct()
	{
		$this->faker = Faker::create();
		$this->data = [];
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
		$segel_id = 1;
		for ($i=1; $i < 11; $i++) {
			$objek_penindakan = $this->faker->randomElement(['sarkut', 'barang', 'bangunan', 'orang']);

			$this->data = [
				'tgl_dok' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'sprint_id' => $this->faker->numberBetween(1,10),
				'objek_penindakan' => $objek_penindakan,
				'lokasi_penindakan' => $this->faker->address(),
				'lokasi_penindakan' => $this->faker->sentence(),
				'uraian_penindakan' => $this->faker->sentence($nbWOrds = 20),
				'alasan_penindakan' => $this->faker->sentence($nbWOrds = 20),
				'jenis_pelanggaran' => $this->faker->randomElement(['Kepabeanan', 'Cukai']),
				'wkt_mulai_penindakan' => $this->faker->dateTime(),
				'wkt_selesai_penindakan' => $this->faker->dateTime(),
				'hal_terjadi' => $this->faker->text(),
				'saksi_id' => $this->faker->numberBetween(1, 100),
			];

			Sbp::create([
				'no_dok' => $i,
				'agenda_dok' => '/KPU.03/BD.05/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'SBP-' . $i . '/KPU.03/BD.05/' . date("Y"),
				'tgl_dok' => $this->data['tgl_dok'],
				'sprint_id' => $this->data['sprint_id'],
				'objek_penindakan' => $this->data['objek_penindakan'],
				'lokasi_penindakan' => $this->data['lokasi_penindakan'],
				'uraian_penindakan' => $this->data['uraian_penindakan'],
				'alasan_penindakan' => $this->data['alasan_penindakan'],
				'jenis_pelanggaran' => $this->data['jenis_pelanggaran'],
				'wkt_mulai_penindakan' => $this->data['wkt_mulai_penindakan'],
				'wkt_selesai_penindakan' => $this->data['wkt_selesai_penindakan'],
				'hal_terjadi' => $this->data['hal_terjadi'],
				'saksi_id' => $this->data['saksi_id'],
				'petugas1_id' => 1,
				'petugas2_id' => 2,
				'kode_status' => 200,
				
				// 'no_dok' => $i,
				// 'agenda_dok' => '/KPU.03/BD.05/',
				// 'thn_dok' => date("Y"),
				// 'no_dok_lengkap' => 'SBP-' . $i . '/KPU.03/BD.05/' . date("Y"),
				// 'tgl_dok' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				// 'sprint_id' => $this->faker->numberBetween(1,10),
				// 'objek_penindakan' => $objek_penindakan,
				// 'lokasi_penindakan' => $this->faker->sentence(),
				// 'uraian_penindakan' => $this->faker->sentence($nbWOrds = 20),
				// 'alasan_penindakan' => $this->faker->sentence($nbWOrds = 20),
				// 'jenis_pelanggaran' => $this->faker->randomElement(['Kepabeanan', 'Cukai']),
				// 'wkt_mulai_penindakan' => $this->faker->dateTime(),
				// 'wkt_selesai_penindakan' => $this->faker->dateTime(),
				// 'hal_terjadi' => $this->faker->text(),
				// 'saksi_id' => $this->faker->numberBetween(1, 100),
				// 'petugas1_id' => 1,
				// 'petugas2_id' => 2,
				// 'kode_status' => 200,
			]);

			switch ($objek_penindakan) {
				case 'sarkut':
					$this->createSegel($segel_id);
					$this->createSarkut($i, $segel_id);
					$this->docRelation($i, $segel_id);
					$segel_id++;
					break;
				
				case 'barang':
					$this->createSegel($segel_id);
					$this->createBarang($i, $segel_id);
					$this->docRelation($i, $segel_id);
					$segel_id++;
					break;
				
				case 'bangunan':
					$this->createSegel($segel_id);
					$this->createBangunan($i, $segel_id);
					$this->docRelation($i, $segel_id);
					$segel_id++;
					break;

				case 'badan':
					$this->createBadan($i);
					break;
						
				default:
					# code...
					break;
			}
		}
    }

	private function createSegel($i)
	{
		Segel::create([
			'no_dok' => $i,
			'agenda_dok' => '/SEGEL/KPU.03/BD.05/',
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => 'BA-' . $i . '/SEGEL/KPU.03/BD.05/' . date("Y"),
			'tgl_dok' => $this->data['tgl_dok'],
			'sprint_id' => $this->data['sprint_id'],
			'objek_penindakan' => $this->data['objek_penindakan'],
			'jenis_segel' => $this->faker->randomElement(['Kertas', 'Timah', 'Gembok']),
			'jumlah_segel' => $this->faker->randomDigit(),
			'nomor_segel' => 'BA-' . $i . '/SEGEL/KPU.03/BD.05/' . date("Y"),
			'lokasi_segel' => $this->faker->word(),
			'saksi_id' => $this->data['saksi_id'],
			'petugas1_id' => 1,
			'petugas2_id' => 2,
			'kode_status' => 200,
		]);
	}

	private function docRelation($sbp_id, $segel_id)
	{
		DocRelation::create([
			'doc1_type' => Segel::class,
			'doc1_id' => $segel_id,
			'doc2_type' => Sbp::class,
			'doc2_id' => $sbp_id
		]);
	}

	private function createSarkut($i, $segel_id)
	{
		$dataSarkut = [
			'nama_sarkut' => $this->faker->company(),
			'jenis_sarkut' => 'Pesawat',
			'no_flight_trayek' => $this->faker->regexify('[A-Z]{2}[0-9]{3}'),
			'jumlah_kapasitas' => $this->faker->numberBetween(1, 100),
			'satuan_kapasitas' => $this->faker->regexify('[A-Z]{3}'),
			'pilot_id' => $this->faker->numberBetween(1, 100),
			'bendera' => $this->faker->countryCode(),
			'no_reg_polisi' => $this->faker->regexify('[A-Z]{5}'),
		];

		Sbp::find($i)->sarkut()->create($dataSarkut);
		Segel::find($segel_id)->sarkut()->create($dataSarkut);
	}

	private function createBarang($i, $segel_id)
	{
		$data_barang = [
			'jumlah_kemasan' => $this->faker->numberBetween(1, 100),
			'satuan_kemasan' => $this->faker->regexify('[a-z]{2}'),
			'pemilik_id' => $this->faker->numberBetween(1, 100)
		];

		$sbp_result = Sbp::find($i)->barang()->create($data_barang);
		$sbp_barang_id = $sbp_result->id;

		$segel_result = Segel::find($segel_id)->barang()->create($data_barang);
		$segel_barang_id = $segel_result->id;

		// $item_count = $this->faker->numberBetween(1, 10);

		// for ($c=1; $c <= $item_count; $c++) {
		// 	$data_item_barang = [
		// 		'jumlah_barang' => $this->faker->numberBetween(1, 100),
		// 		'satuan_barang' => $this->faker->regexify('[a-z]{2}'),
		// 		'uraian_barang' => $this->faker->text()
		// 	];

		// 	$data_dok_barang = [
		// 		'jns_dok' => $this->faker->regexify('[A-Z]{3}'),
		// 		'no_dok' => $this->faker->numberBetween(1, 999999),
		// 		'tgl_dok' => $this->faker->date()
		// 	];

		// 	DetailBarang::find($sbp_barang_id)->itemBarang()->create($data_item_barang);
		// 	DetailBarang::find($segel_barang_id)->itemBarang()->create($data_item_barang);

		// 	DetailBarang::find($sbp_barang_id)->dokumen()->create($data_dok_barang);
		// 	DetailBarang::find($segel_barang_id)->dokumen()->create($data_dok_barang);
		// }
	}

	private function createBangunan($i, $segel_id)
	{
		$data_bangunan = [
			'alamat' => $this->faker->address(),
			'no_reg' => $this->faker->regexify('[0-9]{15}'),
			'pemilik_id' => $this->faker->numberBetween(1, 100),
		];

		Sbp::find($i)->bangunan()->create($data_bangunan);
		Segel::find($segel_id)->bangunan()->create($data_bangunan);
	}

	private function createBadan($i)
	{
		Sbp::find($i)
			->badan()
			->create([
				'entitas_id' => $this->faker->numberBetween(1, 100)
			]);
	}
}
