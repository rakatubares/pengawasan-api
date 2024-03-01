<?php

namespace Database\Seeders;

use App\Models\Entitas\EntitasOrang;
use App\Models\References\RefNegara;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EntitasOrangSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		$data_countries = RefNegara::select('kode_2')->get()->toArray();
		$available_countries = array_map(function($c) {return $c['kode_2'];}, $data_countries);
		$available_identitas = ['KTP', 'PASPOR', 'NPWP'];

		for ($i=0; $i < 100; $i++) { 
			// Insert entity data
			$gender = $faker->randomElement(['male', 'female']);
			$jk = $gender == 'male' ? 'M' : 'F';
			$entitas = EntitasOrang::create([
				'nama' => $faker->name($gender),
				'alias' => $faker->firstName($gender),
				'jenis_kelamin' => $jk,
				'tempat_lahir' => $faker->city(),
				'tanggal_lahir' => $faker->date(),
				'kd_warga_negara' => $faker->randomElement($available_countries),
				'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Kong Hu Cu']),
				'alamat_identitas' => $faker->address(),
				'alamat_tinggal' => $faker->address(),
				'pekerjaan' => $faker->jobTitle(),
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
