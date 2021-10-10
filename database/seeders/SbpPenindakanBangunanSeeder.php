<?php

namespace Database\Seeders;

use App\Models\SbpHeader;
use App\Models\SbpPenindakanBangunan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SbpPenindakanBangunanSeeder extends Seeder
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
			SbpPenindakanBangunan::create([
				'sbp_id' => $i,
				'alamat' => $faker->address(),
				'no_reg' => Str::random(15),
				'pemilik' => $faker->name(),
				'jns_identitas' => Str::random(3),
				'no_identitas' => $faker->regexify('[0-9]{15}'),
			]);
		}
    }
}
