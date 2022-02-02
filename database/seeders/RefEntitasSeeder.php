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
			$gender = $faker->randomElement(['laki-laki', 'perempuan']);
			RefEntitas::create([
				'nama' => $faker->name($gender),
				'jenis_kelamin' => $gender,
				'tempat_lahir' => $faker->city(),
				'tanggal_lahir' => $faker->date(),
				'warga_negara' => $faker->country(),
				'agama' => $faker->randomElement(['islam', 'kristen', 'katolik', 'hindu', 'budha', 'kong hu cu']),
				'jenis_identitas' => $faker->regexify('[A-Z]{3}'),
				'nomor_identitas' => $faker->regexify('[0-9]{6,15}'),
				'pekerjaan' => $faker->jobTitle(),
				'nomor_telepon' => $faker->phoneNumber(),
				'email' => $faker->email(),
				'alamat' => $faker->address()
			]);
		}
	}
}
