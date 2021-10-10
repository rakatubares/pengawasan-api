<?php

namespace Database\Seeders;

use App\Models\SbpPenindakanSarkut;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SbpPenindakanSarkutSeeder extends Seeder
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
			SbpPenindakanSarkut::create([
				'sbp_id' => $i,
				'nama_sarkut' => $faker->sentence($nbWOrds = 2),
				'jenis_sarkut' => $faker->sentence($nbWOrds = 1),
				'no_flight_trayek' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
				'kapasitas' => $faker->numberBetween(1, 100),
				'satuan_kapasitas' => $faker->regexify('[A-Z]{3}'),
				'nama_pilot_pengemudi' => $faker->name(),
				'bendera' => $faker->countryCode(),
				'no_reg_polisi' => $faker->regexify('[A-Z]{5}'),
			]);
		}
    }
}
