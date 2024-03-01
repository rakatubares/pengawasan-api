<?php

namespace Database\Seeders;

use App\Models\Entitas\EntitasBadanHukum;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EntitasBadanHukumSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		$available_identitas = ['NPWP', 'API'];

		for ($i=0; $i < 100; $i++) { 
			// Insert entity data
			$entitas = EntitasBadanHukum::create([
				'nama' => $faker->company(),
				'alamat' => $faker->address(),
				'nomor_telepon' => $faker->phoneNumber(),
				'email' => $faker->email(),
			]);

			// Add identities
			foreach ($available_identitas as $id) {
				$with_id = $faker->boolean();
				$with_penerbit = $faker->boolean();
				if ($with_id) {
					$entitas->identitas()->create([
						'jenis' => $id,
						'nomor' => $faker->regexify('[0-9]{6,15}'),
						'pejabat_penerbit' => $with_penerbit ? $faker->name() : null,
						'tempat_penerbitan' => $with_penerbit ? $faker->city() : null,
					]);
				}
			}
		}
	}
}
