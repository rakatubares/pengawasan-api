<?php

namespace Database\Seeders;

use App\Models\RefEntitas;
use App\Models\RefNegara;
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
		$data_countries = RefNegara::select('kode_2')->get()->toArray();
		$available_countries = array_map(function($c) {return $c['kode_2'];}, $data_countries);

		for ($i=0; $i < 100; $i++) { 
			$gender = $faker->randomElement(['male', 'female']);
			$jk = $gender == 'male' ? 'M' : 'F';
			RefEntitas::create([
				'nama' => $faker->name($gender),
				'alias' => $faker->firstName($gender),
				'jenis_kelamin' => $jk,
				'tempat_lahir' => $faker->city(),
				'tanggal_lahir' => $faker->date(),
				'kd_warga_negara' => $faker->randomElement($available_countries),
				'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Kong Hu Cu']),
				'jenis_identitas' => $faker->randomElement(['KTP', 'PASPOR', 'NPWP', $faker->regexify('[A-Z]{3}')]),
				'nomor_identitas' => $faker->regexify('[0-9]{6,15}'),
				'penerbit_identitas' => $faker->name(),
				'tempat_identitas_terbit' => $faker->city(),
				'alamat_identitas' => $faker->address(),
				'alamat_tinggal' => $faker->address(),
				'pekerjaan' => $faker->jobTitle(),
				'nomor_telepon' => $faker->phoneNumber(),
				'email' => $faker->email(),
			]);
		}
	}
}
