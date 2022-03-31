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
			RefKemasanSeeder::class,
			RefKategoriBarangSeeder::class,
			RefLokasiSeeder::class,
			RefJabatanSeeder::class,
			RefUserCacheSeeder::class,
			RefEntitasSeeder::class,
			RefSprintSeeder::class,
			DokSegelSeeder::class,
			DokTitipSeeder::class,
			DokBukaSegelSeeder::class,
		]);
	}
}
