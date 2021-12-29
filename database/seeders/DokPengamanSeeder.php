<?php

namespace Database\Seeders;

use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\DokPengaman;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class DokPengamanSeeder extends Seeder
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
        for ($i=1; $i < 11; $i++) { 
			$objek_penindakan = $this->faker->randomElement(['sarkut', 'barang']);

			$penindakan = Penindakan::create([
				'sprint_id' => $this->faker->numberBetween(1,10),
				'tanggal_penindakan' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
				'lokasi_penindakan' => $this->faker->address(),
				'saksi_id' => $this->faker->numberBetween(1,100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
			]);

			$max_pengaman = DokPengaman::max('no_dok');
			$no_current = $max_pengaman + 1;
			$pengaman = DokPengaman::create([
				'no_dok' => $no_current,
				'agenda_dok' => '/TANDAPENGAMAN/KPU.03/BD.05/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'BA-' . $no_current . '/TANDAPENGAMAN/KPU.03/BD.05/' . date("Y"),
				'alasan_pengamanan' => $this->faker->sentence($nbWOrds = 20),
				'keterangan' => $this->faker->sentence($nbWOrds = 20),
				'jenis_pengaman' => $this->faker->randomElement(['Kertas', 'Timah', 'Gembok']),
				'jumlah_pengaman' => $this->faker->numberBetween(1,5),
				'satuan_pengaman' => $this->faker->randomElement(['lembar', 'buah']),
				'nomor_pengaman' => 'BA-' . $no_current . '/TANDAPENGAMAN/KPU.03/BD.05/' . date("Y"),
				'tempat_pengaman' => $this->faker->word(),
				'kode_status' => 200,
			]);

			// Create relation Penindakan - SBP
			ObjectRelation::create([
				'object1_type' => 'penindakan',
				'object1_id' => $penindakan->id,
				'object2_type' => 'pengaman',
				'object2_id' => $pengaman->id,
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
}
