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
			RefUserCacheSeeder::class,
			RefEntitasSeeder::class,
			RefSprintSeeder::class,
			DokSbpSeeder::class,
			RiksaSeeder::class,
			DokLphpSeeder::class,
			DokLpSeeder::class,
			DokSegelSeeder::class,
			DokTitipSeeder::class,
			DokBukaSegelSeeder::class,
			DokPengamanSeeder::class,
			DokBukaPengamanSeeder::class,
			DokBastSeeder::class,
			DokContohSeeder::class,
			DokReeksporSeeder::class
		]);
	}
}
