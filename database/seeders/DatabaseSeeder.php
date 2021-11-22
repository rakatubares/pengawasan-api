<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// \App\Models\User::factory(10)->create();
		$this->call([
			RefStatusSeeder::class,
			RefSatuanSeeder::class,
			RefJabatanSeeder::class,
			RefEntitasSeeder::class,
			RefSprintSeeder::class,
			SbpSeeder::class,
			SegelSeeder::class,
			BukaSegelSeeder::class,
			TitipSeeder::class,
			TegahSeeder::class,
		]);
	}
}
