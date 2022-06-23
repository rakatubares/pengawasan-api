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
			RefKepercayaanSumberSeeder::class,
			RefValiditasInformasiSeeder::class,
			RefJabatanSeeder::class,
			RefUserCacheSeeder::class,
			RefEntitasSeeder::class,
			RefSprintSeeder::class,
			DokLppiSeeder::class,
			DokLkaiSeeder::class,
			DokNhiSeeder::class,
			DokLppiNSeeder::class,
			DokLkaiNSeeder::class,
		]);
	}
}
