<?php

namespace Database\Seeders;

use App\Models\DetailBarang;
use App\Models\Sbp;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SbpSeeder extends Seeder
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
			$detail_badan = $faker->boolean();

			Sbp::create([
				'no_dok' => $i,
				'agenda_dok' => '/KPU.03/',
				'thn_dok' => 2021,
				'no_dok_lengkap' => 'SBP-' . $i . '/KPU.03/2021',
				'tgl_dok' => '2021-01-01',
				'sprint_id' => $faker->numberBetween(1,10),
				'detail_sarkut' => $detail_sarkut,
				'detail_barang' => $detail_barang,
				'detail_bangunan' => $detail_bangunan,
				'detail_badan' => $detail_badan,
				'lokasi_penindakan' => $faker->sentence(),
				'uraian_penindakan' => $faker->sentence($nbWOrds = 20),
				'alasan_penindakan' => $faker->sentence($nbWOrds = 20),
				'jenis_pelanggaran' => $faker->randomElement(['Kepabeanan', 'Cukai']),
				'wkt_mulai_penindakan' => $faker->dateTime(),
				'wkt_selesai_penindakan' => $faker->dateTime(),
				'hal_terjadi' => $faker->text(),
				'saksi_id' => $faker->numberBetween(1, 100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
				'kode_status' => 200,
			]);

			if ($detail_sarkut) {
				Sbp::find($i)
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
				$insert_result = Sbp::find($i)
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
				Sbp::find($i)
					->bangunan()
					->create([
						'alamat' => $faker->address(),
						'no_reg' => $faker->regexify('[0-9]{15}'),
						'pemilik_id' => $faker->numberBetween(1, 100),
					]);
			}

			if ($detail_badan) {
				Sbp::find($i)
					->badan()
					->create([
						'entitas_id' => $faker->numberBetween(1, 100)
					]);
			}
		}
    }
}
