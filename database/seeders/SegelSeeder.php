<?php

namespace Database\Seeders;

use App\Models\Segel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SegelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

		for ($i=1; $i < 6; $i++) { 
			Segel::create([
				'no_dok' => $i,
				'agenda_dok' => '/KPU.03/',
				'thn_dok' => 2021,
				'no_dok_lengkap' => 'BA-' . $i . '/SEGEL/KPU.03/2021',
				'tgl_dok' => $faker->date(),
				'no_sprint' => 'SPRINT-01/KPU.03/2021',
				'tgl_sprint' => '2021-01-01',
				'penindakan_sarkut' => 1,
				'penindakan_barang' => 1,
				'penindakan_bangunan' => 1,
				'jenis_segel' => $faker->randomElement(['Kertas', 'Timah', 'Gembok']),
				'jumlah_segel' => $faker->randomDigit(),
				'nomor_segel' => $faker->word(),
				'lokasi_segel' => $faker->word(),
				'nama_pemilik' => $faker->name(),
				'alamat_pemilik' => $faker->address(),
				'pekerjaan_pemilik' => $faker->jobTitle(),
				'jns_identitas' => $faker->randomElement(['KTP', 'NPWP', 'PASSPORT']),
				'no_identitas' => $faker->randomNumber(),
				'pejabat1' => $faker->name(),
				'kode_status' => 200,
			]);
		}
    }
}
