<?php

namespace Database\Seeders;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\DokBukaSegel;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use App\Models\Segel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokBukaSegelSeeder extends Seeder
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
		// Get segel ids
		$max_segel_id = Segel::max('id');
		$available_segel_id = range(1, $max_segel_id);
			
		for ($i=1; $i < 21; $i++) { 
			// Get current number for buka segel
			$max_buka_segel = DokBukaSegel::max('no_dok');
			$no_current = $max_buka_segel + 1;
				
			$linked = $this->faker->boolean();
			if ($linked) {
				// Get data segel
				$segel_id = $this->faker->randomElement($available_segel_id);
				if (($key = array_search($segel_id, $available_segel_id)) !== false) {
					unset($available_segel_id[$key]);
				}
				$segel = Segel::find($segel_id);
				$segel->update(['kode_status' => 201]);

				// Create BA buka segel
				$buka_segel = DokBukaSegel::create([
					'no_dok' => $no_current,
					'agenda_dok' => '/BUKA SEGEL/KPU.03/BD.05/',
					'thn_dok' => date("Y"),
					'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
					'no_dok_lengkap' => 'BA-' . $no_current . '/BUKA SEGEL/KPU.03/BD.05/' . date("Y"),
					'sprint_id' => $this->faker->numberBetween(1,10),
					'jenis_segel' => $segel->jenis_segel,
					'jumlah_segel' => $segel->jumlah_segel,
					'satuan_segel' => $segel->satuan_segel,
					'tempat_segel' => $segel->tempat_segel,
					'nomor_segel' => $segel->nomor_segel,
					'tanggal_segel' => $segel->penindakan->tanggal_penindakan->format('Y-m-d'),
					'saksi_id' => $this->faker->numberBetween(1, 100),
					'petugas1_id' => 1,
					'petugas2_id' => 2,
					'kode_status' => 200,
				]);

				// Create relation Penindakan - Buka Segel
				ObjectRelation::create([
					'object1_type' => 'penindakan',
					'object1_id' => $segel->penindakan->id,
					'object2_type' => 'bukasegel',
					'object2_id' => $buka_segel->id,
				]);
			} else {
				// Create BA buka segel
				$buka_segel = DokBukaSegel::create([
					'no_dok' => $no_current,
					'agenda_dok' => '/BUKA SEGEL/KPU.03/BD.05/',
					'thn_dok' => date("Y"),
					'tanggal_dokumen' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
					'no_dok_lengkap' => 'BA-' . $no_current . '/BUKA SEGEL/KPU.03/BD.05/' . date("Y"),
					'sprint_id' => $this->faker->numberBetween(1,10),
					'jenis_segel' => $this->faker->randomElement(['Kertas', 'Timah', 'Lainnya']),
					'jumlah_segel' => $this->faker->numberBetween(1,5),
					'satuan_segel' => $this->faker->randomElement(['lembar', 'buah']),
					'tempat_segel' => $this->faker->word(),
					'nomor_segel' => 'BA-' . $this->faker->numberBetween(1,100) . '/SEGEL/BC/' . date("Y"),
					'tanggal_segel' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
					'saksi_id' => $this->faker->numberBetween(1, 100),
					'petugas1_id' => 1,
					'petugas2_id' => 2,
					'kode_status' => 200,
				]);

				// Create penindakan
				$objek_penindakan = $this->faker->randomElement(['sarkut', 'barang', 'bangunan']);
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

				$penindakan = Penindakan::create([
					'object_type' => $objek_penindakan,
					'object_id' => $object_id,
				]);

				// Create relation Penindakan - Buka Segel
				ObjectRelation::create([
					'object1_type' => 'penindakan',
					'object1_id' => $penindakan->id,
					'object2_type' => 'bukasegel',
					'object2_id' => $buka_segel->id,
				]);
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
