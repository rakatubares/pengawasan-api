<?php

namespace Database\Seeders;

use App\Models\RefEntitas;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class RefEntitasSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		for ($i=0; $i < 100; $i++) { 
			$jenis_entitas = $faker->randomElement(['perorangan', 'badan usaha']);

			// if ($jenis_entitas == 'perorangan') {
			$gender = $faker->randomElement(['male', 'female']);
			RefEntitas::create([
				'jenis_entitas' => 'perorangan',
				'nama' => $faker->name($gender),
				'jenis_kelamin' => $gender,
				'tanggal_lahir' => $faker->date(),
				'warga_negara' => $faker->country(),
				'jenis_identitas' => $faker->regexify('[A-Z]{3}'),
				'nomor_identitas' => $faker->regexify('[0-9]{6,15}'),
				'pekerjaan' => $faker->jobTitle(),
				'no_handphone' => $faker->phoneNumber(),
				'email' => $faker->email(),
				'alamat' => $faker->address()
			]);
		}
	}
}
