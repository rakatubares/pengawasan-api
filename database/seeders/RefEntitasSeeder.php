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
			$gender = $faker->randomElement(['male', 'female']);
			$jk = $gender == 'male' ? 'laki-laki' : 'perempuan';
			RefEntitas::create([
				'nama' => $faker->name($gender),
				'alias' => $faker->firstName($gender),
				'jenis_kelamin' => $jk,
				'tempat_lahir' => $faker->city(),
				'tanggal_lahir' => $faker->date(),
				'warga_negara' => $faker->country(),
				'agama' => $faker->randomElement(['islam', 'kristen', 'katolik', 'hindu', 'budha', 'kong hu cu']),
				'jenis_identitas' => $faker->randomElement(['KTP', 'PASPOR', 'NPWP', $faker->regexify('[A-Z]{3}')]),
				'nomor_identitas' => $faker->regexify('[0-9]{6,15}'),
				'penerbit_identitas' => $faker->name(),
				'tempat_identitas_terbit' => $faker->city(),
				'alamat' => $faker->address(),
				'alamat_tinggal' => $faker->address(),
				'pekerjaan' => $faker->jobTitle(),
				'nomor_telepon' => $faker->phoneNumber(),
				'email' => $faker->email(),
			]);
		}
	}
}
