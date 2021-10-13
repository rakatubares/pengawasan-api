<?php

namespace Database\Seeders;

use App\Models\SbpHeader;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SbpHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();
		
		for ($i=1; $i <= 5; $i++) { 
			SbpHeader::create([
				'no_sbp' => $i,
				'agenda_sbp' => '/KPU.03/',
				'thn_sbp' => 2021,
				'no_sbp_lengkap' => 'SBP-' . $i . '/KPU.03/2021',
				'tgl_sbp' => '2021-01-01',
				'no_sprint' => 'SPRINT-01/KPU.03/2021',
				'tgl_sprint' => '2021-01-01',
				'penindakan_sarkut' => 1,
				'penindakan_barang' => 1,
				'penindakan_bangunan' => 1,
				'penindakan_badan' => 1,
				'lokasi_penindakan' => $faker->sentence(),
				'uraian_penindakan' => $faker->sentence($nbWOrds = 20),
				'jenis_pelanggaran' => 'kepabeanan',
				'wkt_mulai_penindakan' => $faker->dateTime(),
				'wkt_selesai_penindakan' => $faker->dateTime(),
				'nama_pemilik' => $faker->name(),
				'pejabat1' => Str::random(15),
				'kode_status' => 200
			]);
		}
    }
}
