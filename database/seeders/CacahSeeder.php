<?php

namespace Database\Seeders;

use App\Models\Cacah;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CacahSeeder extends Seeder
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
			Cacah::create([
				'no_dok' => $i,
				'agenda_dok' => '/KPU.03/BD.05/CACAH/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'BA-' . $i . '/KPU.03/BD.05/CACAH/' . date("Y"),
				'tgl_dok' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'tempat_cacah' => $faker->address(),
				'pejabat_st_id' => 2,
				'nomor_st' => 'ST-' . $faker->numberBetween(1,100) . '/KPU.03/BD.05/' . date("Y"),
				'tanggal_st' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'tempat_penindakan' => $faker->address(),
				'tanggal_penindakan' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'barang_penindakan' => $faker->sentence(),
				'tempat_penyimpanan' => $faker->address(),
				'petugas_penindakan_1_id' => 1,
				'petugas_penyidikan_1_id' => 2,
				'kode_status' => 200,
			]);
		}
	}
}
