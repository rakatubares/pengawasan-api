<?php

namespace Database\Seeders;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use App\Models\Sbp;
use App\Models\Segel;
use App\Models\Tegah;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SbpSeeder extends Seeder
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
			$objek_penindakan = $this->faker->randomElement(['sarkut', 'barang', 'bangunan', 'orang']);

			$penindakan = Penindakan::create([
				'sprint_id' => $this->faker->numberBetween(1,10),
				'tanggal_penindakan' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'lokasi_penindakan' => $this->faker->address(),
				'saksi_id' => $this->faker->numberBetween(1,100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
			]);

			$sbp = Sbp::create([
				'no_dok' => $i,
				'agenda_dok' => '/KPU.03/BD.05/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'SBP-' . $i . '/KPU.03/BD.05/' . date("Y"),
				'uraian_penindakan' => $this->faker->sentence($nbWOrds = 20),
				'alasan_penindakan' => $this->faker->sentence($nbWOrds = 20),
				'jenis_pelanggaran' => $this->faker->randomElement(['Kepabeanan', 'Cukai']),
				'wkt_mulai_penindakan' => $this->faker->dateTime(),
				'wkt_selesai_penindakan' => $this->faker->dateTime(),
				'hal_terjadi' => $this->faker->text(),
				'kode_status' => 200,
			]);

			ObjectRelation::create([
				'object1_type' => 'penindakan',
				'object1_id' => $penindakan->id,
				'object2_type' => 'sbp',
				'object2_id' => $sbp->id,
			]);

			switch ($objek_penindakan) {
				case 'sarkut':
					$object = $this->createSarkut();
					$object_id = $object->id;
					$this->createSegel($penindakan->id);
					$this->createTegah($penindakan->id);
					break;

				case 'barang':
					$object = $this->createBarang();
					$object_id = $object->id;
					$this->createSegel($penindakan->id);
					$this->createTegah($penindakan->id);
					break;

				case 'bangunan':
					$object = $this->createBangunan();
					$object_id = $object->id;
					$this->createSegel($penindakan->id);
					break;

				case 'orang':
					$object_id = $this->faker->numberBetween(1,10);
				
				default:
					# code...
					break;
			}

			$penindakan->update([
				'object_type' => $objek_penindakan,
				'object_id' => $object_id
			]);
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

	private function createSegel($penindakan_id)
	{
		$segel = Segel::create([
			'agenda_dok' => '/SEGEL/KPU.03/BD.05/',
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => 'BA-     /SEGEL/KPU.03/BD.05/',
			'jenis_segel' => $this->faker->randomElement(['Kertas', 'Timah', 'Gembok']),
			'jumlah_segel' => $this->faker->randomDigit(),
			'satuan_segel' => $this->faker->regexify('[a-z]{2}'),
			'tempat_segel' => $this->faker->word(),
			'kode_status' => 200,
		]);

		$segel->update([
			'no_dok' => $segel->id,
			'no_dok_lengkap' => 'BA-' . $segel->id . '/SEGEL/KPU.03/BD.05/' . date("Y"),
			'nomor_segel' => 'BA-' . $segel->id . '/SEGEL/KPU.03/BD.05/' . date("Y"),
		]);

		ObjectRelation::create([
			'object1_type' => 'penindakan',
			'object1_id' => $penindakan_id,
			'object2_type' => 'segel',
			'object2_id' => $segel->id,
		]);
	}

	private function createTegah($penindakan_id)
	{
		$tegah = Tegah::create([
			'agenda_dok' => '/TEGAH/KPU.03/BD.05/',
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => 'BA-     /TEGAH/KPU.03/BD.05/',
			'kode_status' => 200,
		]);

		$tegah->update([
			'no_dok' => $tegah->id,
			'no_dok_lengkap' => 'BA-' . $tegah->id . '/TEGAH/KPU.03/BD.05/' . date("Y"),
		]);

		ObjectRelation::create([
			'object1_type' => 'penindakan',
			'object1_id' => $penindakan_id,
			'object2_type' => 'tegah',
			'object2_id' => $tegah->id,
		]);
	}
}
