<?php

namespace Database\Seeders;

use App\Models\SbpPenindakanBadan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SbpPenindakanBadanSeeder extends Seeder
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
			SbpPenindakanBadan::create([
				'sbp_id' => $i,
				'nama' => $faker->name(),
				'tgl_lahir' => $faker->date(),
				'warga_negara' => $faker->countryCode(),
				'alamat' => $faker->address(),
				'jns_identitas' => $faker->regexify('[A-Z]{3}'),
				'no_identitas' => $faker->regexify('[0-9]{15}'),
			]);
		}
    }
}
