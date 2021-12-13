<?php

namespace Database\Seeders;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use App\Models\Segel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SegelSeeder extends Seeder
{
	public function __construct()
	{
		$this->faker = Faker::create();
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($i=1; $i < 21; $i++) { 
			$objek_penindakan = $this->faker->randomElement(['sarkut', 'barang', 'bangunan']);

			$penindakan = Penindakan::create([
				'sprint_id' => $this->faker->numberBetween(1,10),
				'tanggal_penindakan' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'lokasi_penindakan' => $this->faker->address(),
				'saksi_id' => $this->faker->numberBetween(1,100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
			]);

			$max_segel = Segel::max('no_dok');
			$no_current = $max_segel + 1;
			$segel = Segel::create([
				'no_dok' => $no_current,
				'agenda_dok' => '/SEGEL/KPU.03/BD.05/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'BA-' . $no_current . '/SEGEL/KPU.03/BD.05/' . date("Y"),
				'jenis_segel' => $this->faker->randomElement(['Kertas', 'Timah', 'Gembok']),
				'jumlah_segel' => $this->faker->numberBetween(1,5),
				'satuan_segel' => $this->faker->randomElement(['lembar', 'buah']),
				'tempat_segel' => $this->faker->word(),
				'nomor_segel' => 'BA-' . $no_current . '/SEGEL/KPU.03/BD.05/' . date("Y"),
				'kode_status' => 200,
			]);

			// Create relation Penindakan - SBP
			ObjectRelation::create([
				'object1_type' => 'penindakan',
				'object1_id' => $penindakan->id,
				'object2_type' => 'segel',
				'object2_id' => $segel->id,
			]);

			switch ($objek_penindakan) {
				case 'sarkut':
					$object = $this->createSarkut();
					$object_id = $object->id;
					break;

				case 'barang':
					$object = $this->createBarang();
					$object_id = $object->id;
					break;

				case 'bangunan':
					$object = $this->createBangunan();
					$object_id = $object->id;
					break;
				
				default:
					# code...
					break;
			}

			$penindakan->update([
				'object_type' => $objek_penindakan,
				'object_id' => $object_id
			]);

			// if ($objek_penindakan == 'sarkut') {
			// 	Segel::find($i)
			// 		->sarkut()
			// 		->create([
			// 			'nama_sarkut' => $faker->company(),
			// 			'jenis_sarkut' => 'Pesawat',
			// 			'no_flight_trayek' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
			// 			'jumlah_kapasitas' => $faker->numberBetween(1, 100),
			// 			'satuan_kapasitas' => $faker->regexify('[A-Z]{3}'),
			// 			'pilot_id' => $faker->numberBetween(1, 100),
			// 			'bendera' => $faker->countryCode(),
			// 			'no_reg_polisi' => $faker->regexify('[A-Z]{5}'),
			// 		]);
			// }

			// if ($objek_penindakan == 'barang') {
			// 	$insert_result = Segel::find($i)
			// 		->barang()
			// 		->create([
			// 			'jumlah_kemasan' => $faker->numberBetween(1, 100),
			// 			'satuan_kemasan' => $faker->regexify('[a-z]{2}'),
			// 			'pemilik_id' => $faker->numberBetween(1, 100)
			// 		]);

			// 	$detail_barang_id = $insert_result->id;
			// 	$item_count = $faker->numberBetween(1, 10);

			// 	for ($c=1; $c <= $item_count; $c++) { 
			// 		DetailBarang::find($detail_barang_id)
			// 			->itemBarang()
			// 			->create([
			// 				'jumlah_barang' => $faker->numberBetween(1, 100),
			// 				'satuan_barang' => $faker->regexify('[a-z]{2}'),
			// 				'uraian_barang' => $faker->text()
			// 			]);

			// 		DetailBarang::find($detail_barang_id)
			// 			->dokumen()
			// 			->create([
			// 				'jns_dok' => $faker->regexify('[A-Z]{3}'),
			// 				'no_dok' => $faker->numberBetween(1, 999999),
			// 				'tgl_dok' => $faker->date()
			// 			]);
			// 	}
			// }

			// if ($objek_penindakan == 'bangunan') {
			// 	Segel::find($i)
			// 		->bangunan()
			// 		->create([
			// 			'alamat' => $faker->address(),
			// 			'no_reg' => $faker->regexify('[0-9]{15}'),
			// 			'pemilik_id' => $faker->numberBetween(1, 100),
			// 		]);
			// }
			
		}
    }

	private function createSarkut()
	{
		$sarkut = DetailSarkut::create([
			'nama_sarkut' => $this->faker->company(),
			'jenis_sarkut' => 'Pesawat',
			'no_flight_trayek' => $this->faker->regexify('[A-Z]{2}[0-9]{3}'),
			'jumlah_kapasitas' => $this->faker->numberBetween(1, 100),
			'satuan_kapasitas' => $this->faker->regexify('[A-Z]{3}'),
			'pilot_id' => $this->faker->numberBetween(1, 100),
			'bendera' => $this->faker->countryCode(),
			'no_reg_polisi' => $this->faker->regexify('[A-Z]{5}'),
		]);

		return $sarkut;
	}

	public function createBarang()
	{
		$barang = DetailBarang::create([
			'jumlah_kemasan' => $this->faker->numberBetween(1, 100),
			'satuan_kemasan' => $this->faker->regexify('[a-z]{2}'),
			'pemilik_id' => $this->faker->numberBetween(1, 100)
		]);

		DetailBarang::find($barang->id)
			->dokumen()
			->create([
				'jns_dok' => $this->faker->regexify('[A-Z]{3}'),
				'no_dok' => $this->faker->numberBetween(1, 999999),
				'tgl_dok' => $this->faker->date()
			]);

		$item_count = $this->faker->numberBetween(1, 10);
		for ($i=0; $i < $item_count; $i++) { 
			DetailBarang::find($barang->id)
				->itemBarang()
				->create([
					'jumlah_barang' => $this->faker->numberBetween(1, 100),
					'satuan_barang' => $this->faker->regexify('[a-z]{2}'),
					'uraian_barang' => $this->faker->text()
				]);
		}

		return $barang;
	}

	private function createBangunan()
	{
		$bangunan = DetailBangunan::create([
			'alamat' => $this->faker->address(),
			'no_reg' => $this->faker->regexify('[0-9]{15}'),
			'pemilik_id' => $this->faker->numberBetween(1, 100),
		]);

		return $bangunan;
	}
}
