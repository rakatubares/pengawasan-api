<?php

namespace Database\Seeders;

use App\Models\SbpPenindakanBarang;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SbpPenindakanBarangSeeder extends Seeder
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
			SbpPenindakanBarang::create([
				'sbp_id' => $i,
				'jumlah_kemasan' => $faker->numberBetween(1, 100),
				'satuan_kemasan' => $faker->regexify('[a-z]{2}'),
				'jns_dok' => $faker->regexify('[A-Z]{3}'),
				'no_dok' => $faker->regexify('S-[0-9]{3}/[a-z]{10}/[0-9]{4}'),
				'tgl_dok' => $faker->date(),
				'pemilik' => $faker->name()
			]);
		}
    }
}
