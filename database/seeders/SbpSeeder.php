<?php

namespace Database\Seeders;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\Lptp;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use App\Models\Riksa;
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

			$max_sbp = Sbp::max('no_dok');
			$crn_sbp = $max_sbp + 1;
			$sbp = Sbp::create([
				'no_dok' => $crn_sbp,
				'agenda_dok' => '/KPU.03/BD.05/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'SBP-' . $crn_sbp . '/KPU.03/BD.05/' . date("Y"),
				'uraian_penindakan' => $this->faker->sentence($nbWOrds = 20),
				'alasan_penindakan' => $this->faker->sentence($nbWOrds = 20),
				'jenis_pelanggaran' => $this->faker->randomElement(['Kepabeanan', 'Cukai']),
				'wkt_mulai_penindakan' => $this->faker->dateTime(),
				'wkt_selesai_penindakan' => $this->faker->dateTime(),
				'hal_terjadi' => $this->faker->text(),
				'kode_status' => 200,
			]);

			$max_lptp = Lptp::max('no_dok');
			$crn_lptp = $max_lptp + 1;
			$lptp = Lptp::create([
				'no_dok' => $crn_lptp,
				'agenda_dok' => '/KPU.03/BD.05/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'LPTP-' . $crn_lptp . '/KPU.03/BD.05/' . date("Y"),
				'jabatan_atasan' => 'bd.0503',
				'plh' => false,
				'atasan_id' => 4,
				'kode_status' => 200,
			]);

			// Create relation Penindakan - SBP
			ObjectRelation::create([
				'object1_type' => 'penindakan',
				'object1_id' => $penindakan->id,
				'object2_type' => 'sbp',
				'object2_id' => $sbp->id,
			]);

			// Create relation SBP - LPTP
			ObjectRelation::create([
				'object1_type' => 'sbp',
				'object1_id' => $sbp->id,
				'object2_type' => 'lptp',
				'object2_id' => $lptp->id,
			]);

			switch ($objek_penindakan) {
				case 'sarkut':
					$object = $this->createSarkut();
					$object_id = $object->id;
					$this->createRiksa($penindakan->id);
					$this->createTegah($penindakan->id);
					$this->createSegel($penindakan->id);
					break;

				case 'barang':
					$object = $this->createBarang();
					$object_id = $object->id;
					$this->createRiksa($penindakan->id);
					$this->createTegah($penindakan->id);
					$this->createSegel($penindakan->id);
					break;

				case 'bangunan':
					$object = $this->createBangunan();
					$object_id = $object->id;
					$this->createRiksa($penindakan->id);
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

	private function createRiksa($penindakan_id)
	{
		$max_riksa = Riksa::max('no_dok');
		$crn_riksa = $max_riksa + 1;
		$tegah = Riksa::create([
			'no_dok' => $crn_riksa,
			'agenda_dok' => '/RIKSA/KPU.03/BD.05/',
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => 'BA-' . $crn_riksa . '/RIKSA/KPU.03/BD.05/' . date("Y"),
			'kode_status' => 200,
		]);

		// $tegah->update([
		// 	'no_dok' => $tegah->id,
		// 	'no_dok_lengkap' => 'BA-' . $tegah->id . '/RIKSA/KPU.03/BD.05/' . date("Y"),
		// ]);

		ObjectRelation::create([
			'object1_type' => 'penindakan',
			'object1_id' => $penindakan_id,
			'object2_type' => 'riksa',
			'object2_id' => $tegah->id,
		]);
	}

	private function createTegah($penindakan_id)
	{
		$max_tegah = Tegah::max('no_dok');
		$crn_tegah = $max_tegah + 1;
		$tegah = Tegah::create([
			'no_dok' => $crn_tegah,
			'agenda_dok' => '/TEGAH/KPU.03/BD.05/',
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => 'BA-' . $crn_tegah . '/TEGAH/KPU.03/BD.05/' . date("Y"),
			'kode_status' => 200,
		]);

		// $tegah->update([
		// 	'no_dok' => $tegah->id,
		// 	'no_dok_lengkap' => 'BA-' . $tegah->id . '/TEGAH/KPU.03/BD.05/' . date("Y"),
		// ]);

		ObjectRelation::create([
			'object1_type' => 'penindakan',
			'object1_id' => $penindakan_id,
			'object2_type' => 'tegah',
			'object2_id' => $tegah->id,
		]);
	}

	private function createSegel($penindakan_id)
	{
		$max_segel = Segel::max('no_dok');
		$crn_segel = $max_segel + 1;
		$segel = Segel::create([
			'no_dok' => $crn_segel,
			'agenda_dok' => '/SEGEL/KPU.03/BD.05/',
			'thn_dok' => date("Y"),
			'no_dok_lengkap' => 'BA-' . $crn_segel . '/SEGEL/KPU.03/BD.05/' . date("Y"),
			'jenis_segel' => $this->faker->randomElement(['Kertas', 'Timah', 'Gembok']),
			'jumlah_segel' => $this->faker->numberBetween(1,5),
			'satuan_segel' => $this->faker->randomElement(['lembar', 'buah']),
			'tempat_segel' => $this->faker->word(),
			'nomor_segel' => 'BA-' . $crn_segel . '/SEGEL/KPU.03/BD.05/' . date("Y"),
			'kode_status' => 200,
		]);

		// $segel->update([
		// 	'no_dok' => $segel->id,
		// 	'no_dok_lengkap' => 'BA-' . $segel->id . '/SEGEL/KPU.03/BD.05/' . date("Y"),
		// 	'nomor_segel' => 'BA-' . $segel->id . '/SEGEL/KPU.03/BD.05/' . date("Y"),
		// ]);

		ObjectRelation::create([
			'object1_type' => 'penindakan',
			'object1_id' => $penindakan_id,
			'object2_type' => 'segel',
			'object2_id' => $segel->id,
		]);
	}
}
