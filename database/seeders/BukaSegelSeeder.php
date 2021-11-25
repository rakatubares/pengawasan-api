<?php

namespace Database\Seeders;

use App\Models\BukaSegel;
use App\Models\DetailBarang;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BukaSegelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

		for ($i=1; $i < 11; $i++) { 
			$detail_sarkut = $faker->boolean();
			$detail_barang = $faker->boolean();
			$detail_bangunan = $faker->boolean();

			BukaSegel::create([
				'no_dok' => $i,
				'agenda_dok' => '/BUKA SEGEL/KPU.03/BD.O5/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'BA-' . $i . '/BUKA SEGEL/KPU.03/BD.O5/' . date("Y"),
				'tgl_dok' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'sprint_id' => $faker->numberBetween(1,10),
				'detail_sarkut' => $detail_sarkut,
				'detail_barang' => $detail_barang,
				'detail_bangunan' => $detail_bangunan,
				'jenis_segel' => $faker->randomElement(['Kertas', 'Timah', 'Gembok']),
				'jumlah_segel' => $faker->randomDigit(),
				'nomor_segel' => $faker->word(),
				'tempat_segel' => $faker->word(),
				'saksi_id' => $faker->numberBetween(1, 100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
				'kode_status' => 200,
			]);

			if ($detail_sarkut) {
				BukaSegel::find($i)
					->sarkut()
					->create([
						'nama_sarkut' => $faker->company(),
						'jenis_sarkut' => 'Pesawat',
						'no_flight_trayek' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
						'jumlah_kapasitas' => $faker->numberBetween(1, 100),
						'satuan_kapasitas' => $faker->regexify('[A-Z]{3}'),
						'pilot_id' => $faker->numberBetween(1, 100),
						'bendera' => $faker->countryCode(),
						'no_reg_polisi' => $faker->regexify('[A-Z]{5}'),
					]);
			}

			if ($detail_barang) {
				$insert_result = BukaSegel::find($i)
					->barang()
					->create([
						'jumlah_kemasan' => $faker->numberBetween(1, 100),
						'satuan_kemasan' => $faker->regexify('[a-z]{2}'),
						'pemilik_id' => $faker->numberBetween(1, 100)
					]);

				$detail_barang_id = $insert_result->id;
				$item_count = $faker->numberBetween(1, 10);

				for ($c=1; $c <= $item_count; $c++) { 
					DetailBarang::find($detail_barang_id)
						->itemBarang()
						->create([
							'jumlah_barang' => $faker->numberBetween(1, 100),
							'satuan_barang' => $faker->regexify('[a-z]{2}'),
							'uraian_barang' => $faker->text()
						]);

					DetailBarang::find($detail_barang_id)
						->dokumen()
						->create([
							'jns_dok' => $faker->regexify('[A-Z]{3}'),
							'no_dok' => $faker->numberBetween(1, 999999),
							'tgl_dok' => $faker->date()
						]);
				}
			}

			if ($detail_bangunan) {
				BukaSegel::find($i)
					->bangunan()
					->create([
						'alamat' => $faker->address(),
						'no_reg' => $faker->regexify('[0-9]{15}'),
						'pemilik_id' => $faker->numberBetween(1, 100),
					]);
			}
			
		}
    }
}
