<?php

namespace Database\Seeders;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailDokumen;
use App\Models\DetailSarkut;
use App\Models\DokBast;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokBastSeeder extends Seeder
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
			DB::beginTransaction();

			try {
				$yang_menerima_type = $this->faker->randomElement(['orang', 'pegawai']);
				if ($yang_menerima_type == 'orang') {
					$yang_menerima_id = $this->faker->numberBetween(1,100);
					$yang_menyerahkan_type = 'pegawai';
					$yang_menyerahkan_id = 1;
				} else {
					$yang_menerima_id = 1;
					$yang_menyerahkan_type = $this->faker->randomElement(['orang', 'pegawai']);
					if ($yang_menyerahkan_type == 'orang') {
						$yang_menyerahkan_id = $this->faker->numberBetween(1,100);
					} else {
						$yang_menyerahkan_id = 2;
					}
				}

				$max_bast = DokBast::max('no_dok');
				$crn_bast = $max_bast + 1;
				$bast = DokBast::create([
					'no_dok' => $crn_bast,
					'agenda_dok' => '/KPU.03/BD.05/',
					'thn_dok' => date("Y"),
					'no_dok_lengkap' => 'BAST-' . $crn_bast . '/KPU.03/BD.05/' . date("Y"),
					'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
					'yang_menerima_type' => $yang_menerima_type,
					'yang_menerima_id' => $yang_menerima_id,
					'atas_nama_yang_menerima' => $this->faker->sentence($nbWOrds = 20),
					'yang_menyerahkan_type' => $yang_menyerahkan_type,
					'yang_menyerahkan_id' => $yang_menyerahkan_id,
					'atas_nama_yang_menyerahkan' => $this->faker->sentence($nbWOrds = 20),
					'dalam_rangka' => $this->faker->sentence($nbWOrds = 20),
					'kode_status' => 200,
				]);

				$objek_bast = $this->faker->randomElement(['sarkut', 'barang', 'dokumen', 'orang']);

				switch ($objek_bast) {
					case 'sarkut':
						$object = $this->createSarkut();
						$object_id = $object->id;
						break;

					case 'barang':
						$object = $this->createBarang();
						$object_id = $object->id;
						break;

					case 'dokumen':
						$object = $this->createDokumen($bast->id);
						$object_id = $object->id;
						break;

					case 'orang':
						$object_id = $this->faker->numberBetween(1,100);
					
					default:
						# code...
						break;
				}

				$bast->update([
					'object_type' => $objek_bast,
					'object_id' => $object_id
				]);

				DB::commit();

			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
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

	private function createDokumen($bast_id)
	{
		$dokumen = DetailDokumen::create([
			'parent_type' => 'bast',
			'parent_id' => $bast_id,
			'jns_dok' => $this->faker->regexify('[A-Z]{3}'),
			'no_dok' => $this->faker->numberBetween(1, 999999),
			'tgl_dok' => $this->faker->date()
		]);

		return $dokumen;
	}
}
