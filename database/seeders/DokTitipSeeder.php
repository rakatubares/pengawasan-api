<?php

namespace Database\Seeders;

use App\Models\DokSegel;
use App\Models\DokTitip;
use App\Models\ObjectRelation;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DokTitipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

		// Get segel ids
		$max_segel_id = DokSegel::max('id');
		$available_segel_id = range(1, $max_segel_id);

		for ($i=1; $i < 11; $i++) { 
			// Get data segel
			$segel_id = $faker->randomElement($available_segel_id);
			$key = array_search($segel_id, $available_segel_id);
			unset($available_segel_id[$key]);

			// Get current number for titip
			$max_titip = DokTitip::max('no_dok');
			$no_current = $max_titip + 1;

			// Create titip
			$titip = DokTitip::create([
				'no_dok' => $no_current,
				'agenda_dok' => '/TITIP/KPU.03/BD.05/',
				'thn_dok' => date("Y"),
				'no_dok_lengkap' => 'BA-' . $no_current . '/TITIP/KPU.03/BD.05/' . date("Y"),
				'tanggal_dokumen' => $faker->dateTimeThisYear()->format('Y-m-d'),
				'sprint_id' => $faker->numberBetween(1,10),
				'lokasi_titip' => $faker->address(),
				'penerima_id' => $faker->numberBetween(1, 100),
				'saksi_id' => $faker->numberBetween(1, 100),
				'petugas1_id' => 1,
				'petugas2_id' => 2,
				'kode_status' => 200,
			]);

			ObjectRelation::create([
				'object1_type' => 'segel',
				'object1_id' => $segel_id,
				'object2_type' => 'titip',
				'object2_id' => $titip->id,
			]);
			
			// Change SBP status
			$segel = $titip->segel;
			$segel->update(['kode_status' => 205]);
		}
    }
}
