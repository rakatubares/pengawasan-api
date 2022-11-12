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
			RefNegaraSeeder::class,
			RefBandaraSeeder::class,
			RefSatuanSeeder::class,
			RefKemasanSeeder::class,
			RefKategoriBarangSeeder::class,
			RefKategoriPelanggaranSeeder::class,
			RefSkemaPenindakanSeeder::class,
			RefTipeKantorSeeder::class,
			RefKantorBCSeeder::class,
			RefLokasiSeeder::class,
			RefJabatanSeeder::class,
			RefUserCacheSeeder::class,
			RefEntitasSeeder::class,
			RefSprintSeeder::class,
			DokLiSeeder::class,
			DokLapSeeder::class,
			DokSbpSeeder::class,
			DokLphpSeeder::class,
			DokLpSeeder::class,
			DokRiksaSeeder::class,
			DokRiksaBadanSeeder::class,
			DokSegelSeeder::class,
			DokTitipSeeder::class,
			DokBukaSegelSeeder::class,
			DokPengamanSeeder::class,
			DokBukaPengamanSeeder::class,
			DokBastSeeder::class,
			DokContohSeeder::class,
			DokReeksporSeeder::class,
			DokSbpNSeeder::class,
			DokLphpNSeeder::class,
			DokLpNSeeder::class,
		]);
	}
}
