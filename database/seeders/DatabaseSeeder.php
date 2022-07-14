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
			RefKategoriPelanggaranSeeder::class,
			RefSkemaPenindakanSeeder::class,
			RefKemasanSeeder::class,
			RefKategoriBarangSeeder::class,
			RefTipeKantorSeeder::class,
			RefKantorBCSeeder::class,
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
			DokNiSeeder::class,
			DokLiSeeder::class,
			DokLapSeeder::class,
			DokSbpSeeder::class,
			DokLphpSeeder::class,
			DokLpSeeder::class,
			DokSegelSeeder::class,
			DokTitipSeeder::class,
			DokBukaSegelSeeder::class,
			DokRiksaSeeder::class,
			DokRiksaBadanSeeder::class,
			DokPengamanSeeder::class,
			DokBukaPengamanSeeder::class,
			DokBastSeeder::class,
			DokContohSeeder::class,
			DokReeksporSeeder::class,
			DokLppiNSeeder::class,
			DokLkaiNSeeder::class,
			DokNhiNSeeder::class,
			DokSbpNSeeder::class,
			DokLphpNSeeder::class,
			DokLpNSeeder::class,
		]);
	}
}
